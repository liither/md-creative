<x-layout-blog>
    <x-slot:title>{{ $title }}</x-slot:title>

	<div id="colorlib-page">
		<x-navbar-blog></x-navbar-blog>

		<div id="colorlib-main">
			<section class="ftco-section ftco-no-pt ftco-no-pb">
				<div class="container-fluid">
					<div class="row d-flex">
						<div class="col-xl-9 blog-articles-style px-md-5 py-5">
							<div class="row pt-md-5">
								
								<!-- Per page 8 article -->

								@foreach ($posts as $post)
									<div class="col-md-12">
										<div class="blog-entry-2 ftco-animate">
											<a href="/posts/{{ $post->slug }}" class="img" style="background-image: url({{ asset('images/blog/image_1.jpg') }});"></a>
											<div class="text pt-4">
												<h3 class="mb-4"><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h3>
												<div class="mb-4">{{ strip_tags(Str::limit($post->article_text, 200)) }}</div>
												<div class="author mb-4 d-flex align-items-center">
													<a href="/posts/{{ $post->slug }}" class="img" style="background-image: url({{ asset('images/blog/person_1.jpg') }});"></a>
													<div class="ml-3 info">
														<span>Written by</span>
														<h3><b>{{ $post->author->name }}</b>, <span>{{ $post->created_at->diffForHumans() }}</span></h3>
													</div>
												</div>

												<div class="meta-wrap d-md-flex align-items-center">
													<div class="half order-md-last text-md-right">
														<p class="meta">
															<span><i class="icon-heart"></i>3</span>
															<span><i class="icon-eye"></i>100</span>
															<span><i class="icon-comment"></i>5</span>
														</p>
													</div>
													<div class="half">
														<p><a href="/posts/{{ $post->slug }}" class="btn btn-primary p-3 px-xl-4 py-xl-3">Continue Reading</a></p>
													</div>
												</div>
											</div>
										</div>
									</div>
								@endforeach

							</div><!-- END-->
							
							<div class="row">
								<div class="col">
									<div class="blog-page-number">
										<ul>
											<li><a href="#">&lt;</a></li>
											<li class="active"><span>1</span></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#">5</a></li>
											<li><a href="#">&gt;</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						
						<x-sidebar-blog></x-sidebar-blog>
					</div>
				</div>
			</section>
		</div><!-- END COLORLIB-MAIN -->
	</div>
</x-layout-blog>