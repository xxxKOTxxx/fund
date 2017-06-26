export default class WebFont {
  constructor() {
    this.font_link = 'https://fonts.googleapis.com/css?family=Rubik:400,800&amp;subset=cyrillic';
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
        request.open('GET', this.font_link, true);

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
      style.href = this.font_link;
    }
  }
}