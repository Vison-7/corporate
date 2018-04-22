<div id="content-page" class="content group">
				            <div class="clear"></div>
				            <div class="posts">
				                <div class="group portfolio-post internal-post">
                @if($worker)
				                    <div id="portfolio" class="portfolio-full-description">
				                        
				                        <div class="fulldescription_title gallery-filters">
				                            <h1>{{$worker->name}}</h1>
				                        </div>
				                        
				                        <div class="portfolios hentry work group">
                                            <div class="work-thumbnail">
                                        @if(isset($worker -> img -> path) )
				                                <a class="thumb"><img src="{{asset(env('THEME'))}}/images/workers/{{$worker->img->path}}" alt="0081" title="0081" /></a>
                                                @else
                                                 <a class="thumb"><img src="{{asset(env('THEME'))}}/images/workers/noavatar.jpg" alt="0081" title="0081" /></a>
				                        @endif
                                                 </div>
				                            <div class="work-description">
				                                <h3>{{$worker->name}}</h3>
				                             
				                                <div class="clear"></div>
				                                <div class="work-skillsdate">
				                                    <p class="skills"><span class="label">Отдел:</span> {{$worker->department->name }}</p>
				                                    <p class="skills"><span class="label">Должность:</span> {{$worker->position->name}}</p>
                                                    <p class="skills"><span class="label">Дата трудоустройства:</span> {{$worker->since_date->format('d-m-Y')}}</p>
                                                     <p class="skills"><span class="label">Зарплата:</span> {{$worker->position->salary}} у.е.</p>
                                                </div>
				                            </div>
				                            <div class="clear"></div>
				                        </div>
				                     				                       				
				                    </div>
                    @endif
				                    
				                </div>
				            </div>
</div>