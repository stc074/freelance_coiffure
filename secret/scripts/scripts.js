var fen=null;
function openGallery(idGallery) {
    var width=document.body.clientWidth;
    var height=document.body.clientHeight;
    fen=window.open('gallery-'+idGallery+'.html', 'windowGallery', 'left=0, top=0, width='+width+', height='+height);
}

function closeGallery() {
    self.close();
}

function initializeMap(lat, lng, zoom)
{
var mapProp = {
  center:new google.maps.LatLng(lat,lng),
  zoom:zoom,
  mapTypeId:google.maps.MapTypeId.ROADMAP,
  disableDefaultUI:true,
  panControl:false
  };
var map=new google.maps.Map(document.getElementById("map"), mapProp);
}
