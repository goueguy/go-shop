{{--
<section class="">
    <div class="single-slider">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-9 offset-lg-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="home-slider-4">
                                    @if(count($picture)>)
                                    @foreach ($pictures as $picture)
                                        <div class="big-content">
                                            <img src="{{asset("uploads/pictures/".$picture->file)}}" class="h-100" alt="">
                                            <div class="inner">
                                                <h4 class="title">make your <br> site stunning with <br> large title</h4>
                                                <p class="des">Hipster style is a fashion trending for Gentleman and Lady<br>with tattoos. You’ll become so cool and attractive with your’s girl.<br> Now let come hare and grab it now !</p>
                                                <div class="button">
                                                    <a href="#" class="btn">Shop Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<section class="hero-area4">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-3">
                <div class="home-slider-4">
                    @foreach ($pictures as $picture)
                        <div class="big-content">

                            <a href="{{route('article.detail',['article_slug'=>$picture->article->slug])}}"><img src="{{asset("/uploads/pictures/".$picture->file)}}" class="h-auto" alt=""></a>
                            <div class="inner">
                                {{-- <h4 class="title">{{$picture->article->name}}</h4>
                                <p class="des">{{Str::limit($picture->article->description,100)}}</p> --}}
                                {{-- <div class="button">
                                    <a href="#" class="btn">Commander Maintenant</a>
                                </div> --}}
                            </div>

                        </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
