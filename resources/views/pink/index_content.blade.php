<div id="content-blog" class="content group">
@if($departments)
    @foreach($departments as $department)
    <div class="sticky hentry hentry-post blog-big group">
				                <!-- post featured & title -->
				        <div class="thumbnail">
				                    <!-- post title -->
				                    <h2 class="post-title"></h2>
                        </div>
				                <!-- post meta -->
				                <div class="meta group">
				                   
				                </div>
				                <!-- post content -->
				                <div class="the-content group">
				                    
                                        <ul class="ul-treefree ul-dropfree">
                                    
                                            <li>{{$department->name}}
                                              @set($work, $department -> workers->groupBy('chief_id') )   


                                            @foreach($work as $k => $workers)
                                                 @if($k !== 0)
                                                        @break
                                                @endif

                                                 @include(env('THEME').'.inc_workers', ['items' => $workers])

                                            @endforeach
                                            </li>

                                        </ul>
                   
				                </div>
				                <div class="clear"></div>
		</div>
        
      @endforeach
   
      
@endif
<!--    
     <script>
          $(".ul-dropfree").find("li:has(ul)").prepend('<div class="drop"></div>');
	$(".ul-dropfree div.drop").click(function() {
		if ($(this).nextAll("ul").css('display')=='none') {
			$(this).nextAll("ul").slideDown(400);
			$(this).css({'background-position':"-11px 0"});
		} else {
			$(this).nextAll("ul").slideUp(400);
			$(this).css({'background-position':"0 0"});
		}
	});
	$(".ul-dropfree").find("ul").slideUp(400).parents("li").children("div.drop").css({'background-position':"0 0"});
</script> 
-->
 </div>

 
