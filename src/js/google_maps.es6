export default class GoogleMaps {
  constructor(data) {
    this.api_key = data.api_key;
    this.element = document.querySelector(data.selector);
    this.coordinates = {
      lat: data.latitude,
      lng: data.longitude
    };
    this.options = data.options;
    this.options.center = this.coordinates;
    this.styles = data.styles;
    this.language = $('html').prop('lang');
    this.getScript(this.options);
  }

  getScript(options) {
    let url = 'https://maps.googleapis.com/maps/api/js?key=' + this.api_key + '&language=' + this.language;
    jQuery.getScript(
      url,
      () => {
        this.setMap(options);
      }
    );
  }

  setMap(options) {
    this.map = new google.maps.Map(this.element, options);
    this.map.setOptions(
      {
        styles: this.styles
      }
    );
    const icon = {
      url: '/images/common/marker.png',
      size: new google.maps.Size(65, 65),
      scaledSize: new google.maps.Size(32, 32),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(16, 16),
    };

    this.marker = new google.maps.Marker({
      position: this.coordinates,
      map: this.map,
      draggable: false,
      icon: icon
    });
    google.maps.event
      .addListener(
        this.map,
        'tilesloaded',
        ()=> {
          []
            .slice
            .apply(document.querySelectorAll('#map a'))
            .forEach((item)=> {
              item.setAttribute('tabindex', '-1');
            }
          );
        }
      );
  }
}
