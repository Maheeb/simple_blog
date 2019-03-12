<?php

namespace App;

use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use Laravel\Scout\Searchable;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

/**
 * App\Post
 *
 * @property int $id
 * @property int $author_id
 * @property string $title
 * @property string $slug
 * @property string $excerpt
 * @property string $body
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $view_count
 * @property \Illuminate\Support\Carbon|null $published_at
 * @property string|null $deleted_at
 * @property-read \App\User $author
 * @property-read mixed $body_html
 * @property-read mixed $excerpt_html
 * @property-read mixed $image_thumb_url
 * @property-read mixed $published
 * @property-read mixed $tags_html
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post desire()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post draft()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post filter($term)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Post onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post popular()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post published()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post scheduled()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereViewCount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Post withoutTrashed()
 */
class Post extends Model implements Searchable
{

    use SoftDeletes;
    protected $fillable=['image','title','author_id','slug','excerpt','body','published_at'];
    protected $dates = ['created_at', 'updated_at', 'published_at'];

    public function getSearchResult(): SearchResult
    {
        $url = route('seo.show', $this->id);

        return new SearchResult(
            $this,
            $this->title,
            $url
        );
    }

    public function createComment(array $data)
    {
        $this->comments()->create($data);
    }



    public function scopePopular($query)
    {

        $mz = Post::max('view_count');

        return $query->where('view_count',"!=" ,$mz) ;
    }
    public function author()
    {
        return $this->belongsTo(User::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $value ?: NULL;
    }
    public function scopePublished($query)
    {
        return $query->where("published_at", "<=", Carbon::now());
    }
    public function scopeScheduled($query)
    {
        return $query->where("published_at", ">", Carbon::now());
    }

    public function scopeDraft($query)
    {
        return $query->whereNull("published_at");
    }
    public function getPublishedAttribute($value){
        return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }
    public function dateFormatted($showTimes = false)
    {
        $format = "d/m/Y";
        if ($showTimes) $format = $format . " H:i:s";
        return $this->created_at->format($format);
    }
    public function getImageThumbUrlAttribute($value)
    {
        $imageUrl = "";

        if ($this->image !== null)
        {
            $directory = config('cms.image.directory');
            $ext       = substr(strrchr($this->image, '.'), 1);
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $this->image);
            $imagePath = public_path() . "/{$directory}/" . $thumbnail;
            if (file_exists($imagePath)) $imageUrl = asset("{$directory}/" . $thumbnail);
        }

        return $imageUrl;
    }


    public function publicationLabel()
    {
        if ( ! $this->published_at) {
            return '<span class="label label-warning">Draft</span>';
        }
        elseif ($this->published_at && $this->published_at->isFuture()) {
            return '<span class="label label-info">Schedule</span>';
        }
        else {
            return '<span class="label label-success">Published</span>';
        }
    }

    public function scopeDesire($query)
    {
        return $query->orderBy('published_at','asc');
    }
    public function getBodyHtmlAttribute($value)
    {
        return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL;
    }

    public function getExcerptHtmlAttribute($value)
    {
        return $this->excerpt ? Markdown::convertToHtml(e($this->excerpt)) : NULL;
    }
    public function scopeFilter($query, $term)
    {
        // check if any term entered
        if ($term)
        {
            $query->where(function($q) use ($term) {
                // $q->whereHas('author', function($qr) use ($term) {
                //     $qr->where('name', 'LIKE', "%{$term}%");
                // });
                // $q->orWhereHas('category', function($qr) use ($term) {
                //     $qr->where('title', 'LIKE', "%{$term}%");
                // });
                $q->orWhere('title', 'LIKE', "%{$term}%");
                $q->orWhere('excerpt', 'LIKE', "%{$term}%");
            });
        }
    }
    public function getTagsHtmlAttribute()
    {
        $anchors = [];
        foreach($this->tags as $tag) {
            $anchors[] = $tag->name ;
        }
        return implode(", ", $anchors);
    }

    public function createTags($tagString)
    {
        $tags = explode(",", $tagString);
        $tagIds = [];

        foreach ($tags as $tag)
        {
            $newTag = Tag::firstOrCreate(
                ['slug' => str_slug($tag)], ['name' => trim($tag)]
            );
            $newTag->save();

            $tagIds[] = $newTag->id;
        }

        $this->tags()->detach();
        $this->tags()->attach($tagIds);
    }
    public function commentsNumber($label = 'Comment')
    {
        $commentsNumber = $this->comments->count();

        return $commentsNumber . " " . str_plural($label, $commentsNumber);
    }


}
