@foreach ($all_comments as $comment)
                  <div class="custombox clearfix mt-4 pb-4 border-bottom">
                    <div class="row">
                      <div class="col-lg-12">

                        <div class="comments-list">
                          <div class="media">
                            <a class="media-left" href="#">
                              <div class="col-md-2">
                                <img src="{{ asset('uploads/avatar/'.$comment->user->avatar) }}" alt="" class="circular--square" >
                              </div>
                            </a>

                            <div class="media-body">
                              <h4 class="media-heading text-white">{{ $comment->user->display_name }}</h4>
                              <small class="media-heading about-course-text">{{str_replace('-', '/', date('d-m-Y', strtotime($comment->date)))}}</small>
                              <p class="about-course-text">
                                {{$comment->comment}}
                              </p>
                              <p class="about-course-text float-right mr-4">
                                <i class="far fa-comment-alt about-course-text" aria-hidden="true"></i> <a href="" class="about-course-text"> Responder</a>

                              </p>

                            </div>

                          </div>
                        </div>

                      </div><!-- end col -->
                    </div><!-- end row -->
                  </div>
                @endforeach