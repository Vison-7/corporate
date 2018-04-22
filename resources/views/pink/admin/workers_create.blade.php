 <div id="content-page" class="content group">
    <div class="hentry group">
    {!! Form::open(['url' => (isset($worker->id)) ? route('workers.update', ['workers' => $worker->id]) : route('workers.store'), 'class' => 'contact-form', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
         
				                        <ul>
				                            <li class="text-field">
				                                <label for="name-contact-us">
				                                <span class="label">ФИО</span>
				                                <br />					<span class="sublabel">Фамилия, имя, отчество</span><br />
				                                </label>
				                                <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                                                {!!Form::text('name', isset($worker->name) ? $worker -> name : old('name'), ['placeholder' => 'Введите ФИО сотрудника'])!!}
                                                </div>
				                                <div class="msg-error"></div>
				                            </li>
                                            
                                            
                                            
                                        @if(isset($worker -> img -> mini)) 
                                            <li class="textarea-field">
				                                <label >
				                                <span class="label">Фотография сотрудника</span>
				                                <br />				
                                                </label>
                                                {!!Html::image(asset(env('THEME')).'/images/workers/'.$worker -> img -> mini)!!}
                                                    
                                                {!!Form::hidden('old_image', $worker->img->mini) !!}
                                                
				                                <div class="msg-error"></div>
				                            </li>
				                         @endif 
                                            
                                             <li class="text-field">
				                                <label for="name-contact-us">
				                                <span class="label">Загрузить фотографию</span>
				                                <br />					<span class="sublabel">Фото сотрудника</span><br />
				                                </label>
                                               <div class="input-prepend"> {!! Form::file('image', ['class' => 'filestyle', 'data-buttonText' => 'Выберите изображение']) !!}
                                               </div>
                                               
				                                <div class="msg-error"></div>
				                            </li>
                                             
                                                 <li class="text-field">
				                                <label for="name-contact-us">
				                                <span class="label">Должность</span>
				                                <br />					<span class="sublabel">Выберите должность</span><br />
				                                </label>
                                               <div class="input-prepend"> {!! Form::select('position_id', $positions, isset($worker -> position_id) ? $worker -> position_id : '') !!}
                                               </div>
				                                <div class="msg-error"></div>
				                            </li>
                                            
                                             <li class="text-field">
				                                <label for="name-contact-us">
				                                <span class="label">Отдел</span>
				                                <br />					<span class="sublabel">Выберите отдел</span><br />
				                                </label>
                                               <div class="input-prepend"> {!! Form::select('department_id', $departments, isset($worker -> department_id) ? $worker -> department_id : '') !!}
                                               </div>
				                                <div class="msg-error"></div>
				                            </li>
                                            
                                            <li class="text-field">
				                                <label for="name-contact-us">
				                                <span class="label">Дата приема:</span>
				                                <br />					<span class="sublabel">Укажите дату приема на работу:</span><br />
				                                </label>
                                               <div class="input-prepend">
                                                  
                                                   <input type="date" name="since_date" value="{{isset($worker -> since_date) ?($worker -> since_date -> format('Y-m-d')) : ''}}">
                                               </div>
				                                <div class="msg-error"></div>
				                            </li>
                                            
                                          @if(isset($chefs) )  
                                            <li class="text-field">
				                                <label for="name-contact-us">
				                                <span class="label">Руководитель</span>
				                                <br />					<span class="sublabel">Руководитель сотрудника</span><br />
				                                </label>
                                               <div class="input-prepend"> {!! Form::select('chief_id', $chefs, isset($worker -> chief_id) ? $worker -> chief_id : '') !!}
                                               </div>
				                                <div class="msg-error"></div>
				                            </li>
                                        @endif
                                            
                                        @if(isset($worker->id) )
                                            <input type="hidden" name="_method" value="PUT">
                                         @endif  
                                           
                                        <li class="submit-button">
                                            {!! Form::button('Сохранить', ['class' => 'btn btn-french-1', 'type' => 'submit'])!!}
                                            </li>
				                        </ul>
				                  
				        {!! Form::close() !!}
        

    </div>
				            
</div>