$(window).load(function() {
  var elem = document.querySelector('.grid');
  var iso = new Isotope( elem, {
    itemSelector: '.grid-item',
    transitionDuration: '2',
    percentPosition: true,
    layoutMode: 'fitRows'
  });
});

var $grid = $('.grid').isotope({
  itemSelector: '.grid-item',
  transitionDuration: '2',
  percentPosition: true,
  layoutMode: 'fitRows'
});

$( window ).load(function() {
  $grid.imagesLoaded().progress( function() {
    $grid.isotope('layout');
  });
});

$grid.imagesLoaded().progress( function() {
  $grid.isotope('layout');
});

function redo_layout() {
  await sleep(2000);
  $grid.isotope('layout');
}
