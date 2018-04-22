@if($workers)
<div id="content-page" class="content group">
     <div class="hentry group">
				               
				        
				                    
				                    <h2>{!!Html::link(route('workers.index'), 'Панель управления')!!}</h2>
         
                            {!! Form::open(['url' => route('workers.create'), 'class' => 'form-horizontal', 'method' => 'get'])!!}
                            {!! Form::button('Добавить сотрудника', ['class' => 'btn btn-french-1', 'type' => 'submit'])!!}
                            {!! Form::close() !!}
                                            
				                        {!! Form::open(['url' => route('search'), 'class' => 'contact-form', 'method' => 'post'])!!}
                                           <ul>
				                            <li class="text-field">
 
				                                <div class="input-prepend">
                                                {!!Form::text('search', old('search'), ['placeholder' => 'введите текст'])!!}
                                                </div>
                                          
                                                <div class="msg-error"></div>
                                                 {!! Form::button('Поиск', ['class' => 'btn btn-french-1', 'type' => 'submit'])!!}
                                            </li>
                                                
                                            </ul>
                                         {!! Form::close() !!} 
         
                                 
				                <br/>    
                     
         
				                    <div class="short-table white">
				                       <table style="width:100%" cellpadding="0">
                                        <thead>
										<tr>
                                        <th> <a href="http://corporate/workers?sort=id">ID</a></th> 
                                           <th> <a href="http://corporate/workers?sort=name">ФИО</a></th> 
                                           <th><a href="http://corporate/workers?sort=position_id">Должность</a></th>
                                            <th><a href="http://corporate/workers?sort=since_date">Дата приема</a></th>
                                            <th><a href="http://corporate/workers?sort=department_id">Отдел</a></th> 
										   <th> Фото</th>
										   <th> Действие</th>
										 <tr>
                                        </thead>                                
                                          
				                    
									
									@foreach($workers as $worker)
									<tr>
										<td class="align-center">{{$worker -> id}}</td>
										<td class="align-center">{!!Html::link(route('workers.show', ['workers' => $worker -> id]), $worker -> name)!!}</td>
										<td class="align-center">{{$worker -> position -> name}}</td>
                                        <td class="align-center">{{$worker->since_date->format('d-m-Y')}}</td>
                                        <td class="align-center">{{$worker -> department -> name}}</td>
										<td class="align-center">
										@if(isset($worker->img->mini) )
										{!!Html::image(asset(env('THEME').'/images/workers/'.$worker->img -> mini) )!!}
                                         @endif
										</td>
										<td>
                                            {!! Form::open(['url' => route('workers.edit', ['workers' => $worker -> id]), 'class' => 'form-horizontal', 'method' => 'get'])!!}
											{!! Form::button('Редактировать', ['class' => 'btn btn-french-1', 'type' => 'submit'])!!}
											{!! Form::close() !!}
                                            
											{!! Form::open(['url' => route('workers.destroy', ['workers' => $worker -> id]), 'class' => 'form-horizontal', 'method' => 'post'])!!}
											{{method_field('DELETE')}}
											{!! Form::button('Удалить', ['class' => 'btn btn-french-5', 'type' => 'submit'])!!}
                                            {!! Form::close() !!}
										</td>
									</tr>
									@endforeach
									</table> 
                                        
                                        </div>
    
         <div class="general-pagination group">
                @if($workers ->lastPage() > 1)
                    
                        @if($workers->currentPage() != 1)
                            <a href="http://corporate/workers?page=1" class="">{{Lang::get('pagination.first')}}</a>
                            <a href="{{$workers->url($workers->currentPage() - 1 ) }}" class="selected">{{Lang::get('pagination.previous')}}</a>
                        @endif
                        
               
            
                   @if($workers->currentPage() != $workers ->lastPage() )
                        <a href="{{$workers->url(($workers->currentPage() + 1) )}}" class="selected">{{Lang::get('pagination.next')}}</a>
                            <a href="{{$workers->url(($workers->lastPage() ) )}}" class="selected">{{Lang::get('pagination.last')}}</a>
                                     
                          
                    @endif
 
    @endif
            </div>     
	</div>
 
    @endif
</div>	
				                    