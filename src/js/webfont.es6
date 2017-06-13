export default class WebFont {
  constructor() {
    this.setFont();
  }

  addFont() {
    let style = document.createElement('style');
    style.rel = 'stylesheet';
    document.head.appendChild(style);
    style.textContent = localStorage.OpenSans;
  }

  setFont() {
    try {
      if(localStorage.OpenSans) {
        this.addFont();
      }
      else {
        let request = new XMLHttpRequest();
        request.open('GET', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&amp;subset=cyrillic-ext', true);

        request.onload = function() {
          if (request.status >= 200 && request.status < 400) {
            localStorage.OpenSans = request.responseText;
            this.addFont();
          }
        };
        request.send();
      }
    }
    catch(error) {
      let style = document.createElement('style');
      style.rel = 'stylesheet';
      document.head.appendChild(style);
      style.href = 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&amp;subset=cyrillic-ext';
    }
  }
}