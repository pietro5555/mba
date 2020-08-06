 
 @if($component->isNotEmpty())
    
    <div class="row">
        <div class="col-md-12">
            
            <div class="box-body">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    
                     @php
                    $con=-1;
                    @endphp
                    @foreach($component as $item)
                    @php
                    $con++;
                    @endphp
                    
                    @if($con == 0)
                  <div class="item active">
                    <img src="{{asset('drop/'.$item->slider)}}" alt="{{$con}}" style="width: 100%; height: 120px;">

                   
                  </div>
                  @else
                  <div class="item">
                    <img src="{{asset('drop/'.$item->slider)}}" alt="{{$con}}"  style="width: 100%; height: 120px;">

                    
                  </div>
                    @endif
                   @endforeach
                  
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            </div>
            
        </div>
    </div>
@endif
