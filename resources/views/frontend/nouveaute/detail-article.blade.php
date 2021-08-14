@extends('layouts.frontend')

@section('content')
	<!-- Shop Single -->
    @section('sidebar')
    @stop
    <section class="shop single section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <!-- Product Slider -->
                            <div class="product-gallery">
                                <!-- Images slider -->
                                <div class="flexslider-thumbnails">
                                    <ul class="slides">
                                        @if(isset($articles))
                                            @foreach ($article->images as $image)
                                                <li data-thumb="{{asset('uploads/pictures/'.$image->file)}}">
                                                    <img src="{{asset('uploads/pictures/'.$image->file)}}" alt="#">
                                                </li>
                                            @endforeach
                                        @endif

                                        {{-- <li data-thumb="https://via.placeholder.com/570x520">
                                            <img src="https://via.placeholder.com/570x520" alt="#">
                                        </li>
                                        <li data-thumb="https://via.placeholder.com/570x520">
                                            <img src="https://via.placeholder.com/570x520" alt="#">
                                        </li>
                                        <li data-thumb="https://via.placeholder.com/570x520">
                                            <img src="https://via.placeholder.com/570x520" alt="#">
                                        </li> --}}
                                    </ul>
                                </div>
                                <!-- End Images slider -->
                            </div>
                            <!-- End Product slider -->
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="product-des">
                                <!-- Description -->
                                <div class="short">
                                    <h4>{{$article->name}}</h4>
                                    <div class="rating-main">
                                        <ul class="rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-o"></i></li>
                                            <li class="dark"><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        <a href="#" class="total-review">(102) Review</a>
                                    </div>
                                    <p class="price"><span class="discount">{{$article->price}} FCFA</span><s>$80.00</s> </p>
                                    <p class="description justify-content-center">{{$article->description}}>
                                </div>
                                <!--/ End Description -->
                                <!-- Color -->
                                {{-- <div class="color">
                                    <h4>Available Options <span>Color</span></h4>
                                    <ul>
                                        <li><a href="#" class="one"><i class="ti-check"></i></a></li>
                                        <li><a href="#" class="two"><i class="ti-check"></i></a></li>
                                        <li><a href="#" class="three"><i class="ti-check"></i></a></li>
                                        <li><a href="#" class="four"><i class="ti-check"></i></a></li>
                                    </ul>
                                </div>
                                <!--/ End Color -->
                                <!-- Size -->
                                <div class="size">
                                    <h4>Size</h4>
                                    <ul>
                                        <li><a href="#" class="one">S</a></li>
                                        <li><a href="#" class="two">M</a></li>
                                        <li><a href="#" class="three">L</a></li>
                                        <li><a href="#" class="four">XL</a></li>
                                        <li><a href="#" class="four">XXL</a></li>
                                    </ul>
                                </div> --}}
                                <!--/ End Size -->
                                <!-- Product Buy -->
                                <div class="product-buy">
                                    <div class="quantity">
                                        <h6>Quantity :</h6>
                                        <!-- Input Order -->
                                        <div class="input-group">
                                            <div class="button minus">
                                                <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
                                            <div class="button plus">
                                                <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="#" class="btn">Ajouter au Panier</a>
                                        <a href="#" class="btn min"><i class="ti-heart"></i></a>
                                        {{-- <a href="#" class="btn min"><i class="fa fa-compress"></i></a> --}}
                                    </div>
                                    <p class="cat">Catégorie :<a href="#">{{$article->subcategory->category->name}}</a></p>
                                    <p class="availability">Disponibilité : {{$article->quantity}} Articles en Stock</p>
                                </div>
                                <!--/ End Product Buy -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="product-info">
                                <div class="nav-main">
                                    <!-- Tab Nav -->
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Commentaires</a></li>
                                    </ul>
                                    <!--/ End Tab Nav -->
                                </div>
                                <div class="tab-content" id="myTabContent">
                                    <!-- Description Tab -->
                                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                                        <div class="tab-single">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="single-des">
                                                        {{$article->description}}
                                                    </div>
                                                    {{-- <div class="single-des">
                                                        <p>Suspendisse consequatur voluptates lorem nobis accumsan natus mattis. Optio pede, optio qui metus, delectus! Ultricies impedit, minus tempor fuga, quasi, pede felis commodo bibendum voluptas nisi? Voluptatem risus tempore tempora. Quaerat aspernatur? Error praesent laoreet, cras in fames hac ea, massa montes diamlorem nec quaerat, quos occaecati leo nam aliquet corporis, ab recusandae parturient, etiam fermentum, a quasi possimus commodi, mollis voluptate mauris mollis, quisque donec</p>
                                                    </div>
                                                    <div class="single-des">
                                                        <h4>Product Features:</h4>
                                                        <ul>
                                                            <li>long established fact.</li>
                                                            <li>has a more-or-less normal distribution. </li>
                                                            <li>lmany variations of passages of. </li>
                                                            <li>generators on the Interne.</li>
                                                        </ul>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ End Description Tab -->
                                    <!-- Reviews Tab -->
                                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                                        <div class="tab-single review-panel">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="ratting-main">
                                                        <div class="avg-ratting">
                                                            <h4>4.5 <span>(Overall)</span></h4>
                                                            <span>Based on 1 Comments</span>
                                                        </div>
                                                        <!-- Single Rating -->
                                                        <div class="single-rating">
                                                            <div class="rating-author">
                                                                <img src="https://via.placeholder.com/200x200" alt="#">
                                                            </div>
                                                            <div class="rating-des">
                                                                <h6>Naimur Rahman</h6>
                                                                <div class="ratings">
                                                                    <ul class="rating">
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star-half-o"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                    </ul>
                                                                    <div class="rate-count">(<span>3.5</span>)</div>
                                                                </div>
                                                                <p>Duis tincidunt mauris ac aliquet congue. Donec vestibulum consequat cursus. Aliquam pellentesque nulla dolor, in imperdiet.</p>
                                                            </div>
                                                        </div>
                                                        <!--/ End Single Rating -->
                                                        <!-- Single Rating -->
                                                        <div class="single-rating">
                                                            <div class="rating-author">
                                                                <img src="https://via.placeholder.com/200x200" alt="#">
                                                            </div>
                                                            <div class="rating-des">
                                                                <h6>Advin Geri</h6>
                                                                <div class="ratings">
                                                                    <ul class="rating">
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                    </ul>
                                                                    <div class="rate-count">(<span>5.0</span>)</div>
                                                                </div>
                                                                <p>Duis tincidunt mauris ac aliquet congue. Donec vestibulum consequat cursus. Aliquam pellentesque nulla dolor, in imperdiet.</p>
                                                            </div>
                                                        </div>
                                                        <!--/ End Single Rating -->
                                                    </div>
                                                    <!-- Review -->
                                                    <div class="comment-review">
                                                        <div class="add-review">
                                                            <h5>Add A Review</h5>
                                                            <p>Your email address will not be published. Required fields are marked</p>
                                                        </div>
                                                        <h4>Your Rating</h4>
                                                        <div class="review-inner">
                                                            <div class="ratings">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/ End Review -->
                                                    <!-- Form -->
                                                    <form class="form" method="post" action="mail/mail.php">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-12">
                                                                <div class="form-group">
                                                                    <label>Votre nom<span>*</span></label>
                                                                    <input type="text" name="name" required="required" placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-12">
                                                                <div class="form-group">
                                                                    <label>Votre Adresse Email<span>*</span></label>
                                                                    <input type="email" name="email" required="required" placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-12">
                                                                <div class="form-group">
                                                                    <label>Écrire un commentaire<span>*</span></label>
                                                                    <textarea name="message" rows="6" placeholder="" ></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-12">
                                                                <div class="form-group button5">
                                                                    <button type="submit" class="btn">Envoyer</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!--/ End Form -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ End Reviews Tab -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection
