var course_id =0;

$('.like').on('click', function (event){

event.preventDefault();
course_id = event.target.parentNode.parentNode.dataset['course_id'];

$.ajax({
	method: 'POST',
	url:urlLike,
	data: {course_id: course_id, _token: token}
})

});