@extends('layout')

@section('content')
<div class='container main-container'>


<section class='row'>
<h1 class='col-md-9'>{{trans('blogpost.view_blogpost')}}</h1>

<nav id="arrows" class='col-xs-12 col-md-3'>
  <ul class='pager'>

    @if($previous_blogpost)
        <li class='previous' v-on:keyup.left="previous"><a href="{{admin_link('blogpost-view',$previous_blogpost)}}"> <span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span> {{trans('actions.previous')}}</a></li>
    @endif

    @if($next_blogpost)
        <li class='next' v-on:keyup.right="next"><a href="{{admin_link('blogpost-view',$next_blogpost)}}">{{trans('actions.next')}} <span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span> </a></li>
    @endif


  </ul>
</nav>
</section>


<section class='row'>
<div class='col-md-4'>
<button type='button' class='btn btn-link' data-toggle='modal' data-target='.{{ $blogpost->id }}-modal-xl'>
  <img src='{{ $blogpost->getImage() }}' width='350' class='img img-thumbnail' style='margin-top:20px;' />
</button>
</br>
<center>
  <div class='btn-group' role='group'>
    @if(!$blogpost->isFeatured())
      <a href="{{admin_link('blogpost-featured',$blogpost->id)}}" type='button' class='btn btn-success'><span class='glyphicon glyphicon-star' aria-hidden='true'></span> {{trans('blogpost.primary')}}</a>
    @else
      <a href="{{admin_link('blogpost-revoke-featured',$blogpost->id)}}" type='button' class='btn btn-success'><span class='glyphicon glyphicon-minus' aria-hidden='true'></span> {{trans('Revoke')}}</a>
    @endif
    <a href="{{admin_link('blogpost-edit',$blogpost->id)}}" type='button' class='btn btn-warning'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> {{trans('actions.edit')}} </a>
    
    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='.delete'>
    <span class='glyphicon glyphicon-trash' aria-hidden='true'></span> {{trans('actions.remove')}}
    </button>
  </div>

  @if($blogpost->isDraft())
  <br><br>
    <span class="label label-info" style='font-size:14px; display:block'>{{trans('actions.draft')}}</span>
  @endif

  @if($blogpost->author)
    </br></br><b>{{trans('blogpost.author')}} : </br><a href="{{admin_link('user-view',$blogpost->author->id)}}">{{ $blogpost->author->username }}</a></b>
     @else
    </br></br><b>{{trans('blogpost.author')}} : </br>{{ trans('blogpost.removed_user') }}</b>
  @endif 

    </br></br><b>{{trans('blogpost.slug')}} : </br><a>{{ $blogpost->getSlug() }}</a></b>
    </br></br><b>{{trans('blogpost.published_on')}} : </br><a>{{ $blogpost->created_at->format(\Settings::get('date_format',\Config::get('horizontcms.default_date_format'),true)) }}</a></b>
  
  @if($blogpost->category)  
    </br></br><b>{{trans('blogpost.category')}} : </br><a href="{{ admin_link('blogpost_category-view',$blogpost->category->id) }}">{{ $blogpost->category->name }}</a></b>
  @endif
    </br></br><b>{{trans('blogpost.reading_time')}} : <br><a>{{ ceil($blogpost->getReadingTime()/60) }} mins</a></b>
    </br></br><b>{{trans('blogpost.characters')}} : <br><a>{{ $blogpost->getTotalCharacterCount() }}</a></b>
    </br></br><b>{{trans('blogpost.words')}} : <br><a>{{ $blogpost->getTotalWordCount() }}</a></b>
    </br></br><b>{{trans('blogpost.comments')}} : <a>{{ $blogpost->comments->count() }}</a></b>
</center>
</div>

<div class="col-md-8" style='text-align:justify;padding-top:2.5%;'>
  <div class='well'>
    <h3>{{ $blogpost->title }}</h3><hr/>
    <b>{{ $blogpost->summary }}</b>
    <p style='margin-top:40px;'>
    {!! $blogpost->text !!}
    </p>
  </div>  
    </td>
</div>

</section>
<div id='comments'></div>
</br></br>


<?php 

  Bootstrap::image_details($blogpost->id,$blogpost->getImage());


  Bootstrap::delete_confirmation(
    "delete",
    trans('actions.are_you_sure'),
    "<b>".trans('actions.delete_this',['content_type'=>'post']).": </b>". $blogpost->title." <b>?</b>",
    "<a href='".admin_link('blogpost-delete',$blogpost->id)."' type='button' class='btn btn-danger'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> ".trans('actions.delete')."</a>
    <button type='button' class='btn btn-default' data-dismiss='modal'>".trans('actions.cancel')."</button>"
    );

?>


@include('blogposts.comments')


</div>


<script>

var arrow = new Vue({
  el: '#arrows',
  data:{

  },
  methods:{
    previous: function(){
       window.location.replace("{{ admin_link('blogpost-view',$previous_blogpost) }}");
    },
    next: function(){
      window.location.replace("{{admin_link('blogpost-view',$next_blogpost)}}");
    }
  },
  beforeCreate: function(){
    console.log("Vue started.");
  }
});

</script>



@endsection