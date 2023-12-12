$('.deleteLessonBtn').on('click', function () {
  var lessonId = $(this).data('id');

  $.ajax({
      type: 'POST',
      url: 'deleteLesson.php', 
      data: { lessonId: lessonId },
      success: function (response) {
          console.log(response);
          $('#dersGuncelle').modal('hide');
      },
      error: function (error) {
          console.error(error);
      }
  });
});

