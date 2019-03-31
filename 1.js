$(function() {

	// Thư viện sắp xếp ảnh
	khoimonan = $('.nhieumon').isotope({
	  	itemSelector: '.motmon',
	  	layoutMode: 'fitRows'
	});
	// Load đến đâu xử lý đến đó
	khoimonan.imagesLoaded().progress( function() {
	  	khoimonan.isotope('layout');
	});

	// lúc truyền dữ liệu để data-
	// lúc lấy về để data()
	// hiệu ứng lọc món ăn bằng html5
	$('.tieudect a').click(function() {
		dulieu = $(this).data('monan');

		khoimonan.isotope({ filter: dulieu })
		return false; // bỏ tác dụng thẻ a
	});


	new WOW().init();

});