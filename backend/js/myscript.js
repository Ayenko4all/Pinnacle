
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


 $(document).ready(function(){
        $('.footable').footable();
      });

tinymce.init({ selector:'textarea' });

var table = '#mytable'
$('#maxRow').on('change', function(){

	$('.pagination').html('')

	var trnum = 0

	var maxRow = parseTnt($(this).val())

	var totalRows = $(table+' tbody tr').length

	$(table+' tr:gt(0)').each(function(){
		trnum++
		if (trnum > maxRow) {
			$(this).hide()
		}
		if (trnum <= maxRow) {
			$(this).show()
		}
	})
	if (totalRows > maxRow) {
		var pagenum = Math.ceil(totalRows/maxRow)
		for(var i = 1; i <= pagenum;) {
			$('.pagination').append('<li data-page="'+i+'">\<span>'+ i++ +'<span class="sr-only">(current)</span></span>\</li>').show()
		}
	}
	$('.pagination li:first-child').addClass('active')
	$('.pagination li').on('click', function(){
		var pageNum = $(this).attr('data-page')
		var trIndex = 0;
		$('.pagination').removeClass('active')
		$(this).addClass('active')
		$(table+' tr:gt(0)').each(function(){
			trIndex++
			if(trIndex > (maxRow*pageNum) || trIndex <= ((maxRow*pageNum)-maxRow)){
				$(this).hide()
			} else {
				$(this).show()
			}
		})
	})

})

$(function(){
	$('table tr:eq(0)').prepend('<th>ID</th>')
	var id = 0;
	$('table tr:gt(0)').each(function(){
		id++
		$(this).prepend('<td>'+id+'</td>')
	})
})
