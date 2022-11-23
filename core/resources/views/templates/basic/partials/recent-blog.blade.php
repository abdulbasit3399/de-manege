<div class="col-lg-4">
    <div class="widgets-box">
        <div class="sidebar-head bg-2"><span>@lang('Recent Posts')</span></div>
        <div class="sidebar-text">
            <ul class="sidebar-post">

                @foreach($recentBlog as $k=> $data)
                <li>
                    <div class="image-thumb">
                        <a href="{{route('home.blog.details',[str_slug(@$data->data_values->title),$data->id])}}">
                            <img src="{{asset('assets/images/frontend/blog/thumb_'.@$data->data_values->image)}}" alt="{{@$data->data_values->title}}">
                        </a>
                    </div>
                    <div class="post-text">
                        <h4 ><a href="{{route('home.blog.details',[str_slug(@$data->data_values->title),$data->id])}}" class="text-white">{{__(str_limit(@$data->data_values->title, 40))}}</a></h4>
                        <div class="post-date">
                            <i class="fa fa-clock-o"></i> {{date('d-M-Y', strtotime(@$data->created_at))}}
                        </div>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
</div>
