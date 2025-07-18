<x-layout-blog>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <div id="colorlib-page">
		<x-navbar-blog></x-navbar-blog>

		<div id="colorlib-main">
			<section class="ftco-section ftco-no-pt ftco-no-pb">
                <div class="container-fluid">
                    <div class="row d-flex">
                        <div class="col-xl-9 blog-articles-style px-md-5 py-4">
                            <div class="row pt-md-5">
                                <div class="col-md-12"> 
                                    <h1 class="mb-3">{{ $post->title }}</h1>
                                    
                                    <!-- Post Image -->
                                    <div class="col-12">
                                        <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('images/blog/default_image.jpg') }}" 
                                             alt="{{ $post->title }}" 
                                             class="img-single-blog-fluid">
                                    </div>

                                    <!-- Post Content -->
                                    <div>{!! $post->article_text !!}</div>
                                    
                                    <p></p>
                                    
                                    <!-- Tags (you can replace these with actual tags from your post if applicable) -->
                                    <div class="tag-widget post-tag-container mb-5 mt-5">
                                        <div class="tagcloud">
                                            @foreach ($post->tags ?? [] as $tag)
                                                <a href="#" class="tag-cloud-link">{{ $tag->name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                            

                                    <!-- Author Section -->
                                    <div class="about-author d-flex p-4 bg-light">
                                        <div class="bio mr-5">
                                            <img src="{{ asset('images/blog/person_1.jpg') }}" alt="Image placeholder" class="img-fluid mb-4">
                                        </div>
                                        
                                        <div class="desc">
                                            <h3>{{ $post->author->name }}</h3>
                                            <p>{{ $post->author->bio ?? 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus.' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- END-->
                        </div>

                        <x-sidebar-blog></x-sidebar-blog>
                    </div>
                </div>
	        </section>
		</div><!-- END COLORLIB-MAIN -->
	</div>
</x-layout-blog>