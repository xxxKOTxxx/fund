export default class Menu {
  constructor(config) {
    this.speed = config.scroll_speed;
    this.panel = $(config.panel_selector);
    this.navigation_links = $('a[href*=\\#]');
    this.navigation_blocks = [];
    this.navigation_blocks = $.unique(
      this.navigation_links
        .map(
          (index, link)=> {
            return $(link.href.substring(link.href.indexOf('#')));
          }
        )
      );
    this.navigation_blocks.sort(
      (a, b)=> {
        let a_pos = $(a).offset().top;
        let b_pos = $(b).offset().top;
        return ((a_pos < b_pos) ? -1 : ((a_pos > b_pos) ? 1 : 0));
      }
    );
    this.navigation_blocks_length = this.navigation_blocks.length;
    this.current_item = '';
    this.setMenu();
  }

  setMenu() {
    this.navigation_links.on(
      'click',
      this.anchorHandler.bind(this)
    );
    $(window)
      .on(
        'popstate',
        ()=> {
          let hash = window.location.hash;
          if(hash.length) {
            this.scrollHandler($('a[href="'+ hash +'"]'), false);
          }
          else {
            this.scrollToPosition(0);
          }
        }
      );
  }

  getLinkTarget(link) {
    let url = link.prop('href');
    let id = url.substring(url.indexOf('#'));
    return $(id);
  }

  anchorHandler(event) {
    event.preventDefault();
    let link = $(event.currentTarget);
    this.scrollHandler(link);
  }

  scrollToPosition(position) {
    let current_position = Math.ceil($(window).scrollTop());
    let distance = Math.abs(current_position - position);
    if(!distance) {
      return;
    }
    let time = distance / this.speed * 1000;
    $('html, body')
      .stop()
      .animate(
        {scrollTop: position},
        time,
        'linear'
      );

  }
  scrollHandler(link, set_state = true) {
    let target = this.getLinkTarget(link);
    let target_position = Math.floor(target.offset().top);
    let target_padding = parseInt(target.css('padding-top'));
    let position = target_position + target_padding;

    if(set_state) {
      this.setState(link);
    }
    this.scrollToPosition(position);
  }

  setState(link) {
    if(history) {
      let state = history.state;
      let url = link.prop('href');
      let title = document.title;
      history.pushState(state, title, url);
    }
  }

  getMenuActive(scroll) {
    scroll += Math.ceil(this.panel.height() + 1);
    let current_item;
    $.each(
      this.navigation_blocks,
      (index, block)=> {
        let block_position = block.offset().top;

        if(index + 1 == this.navigation_blocks_length) {
          if(block_position <= scroll) {
            current_item = block.prop('id');
          }
          else {
            current_item = this.navigation_blocks[index - 1].prop('id');
          }
          return false;
        }
        if(scroll < block_position) {
          current_item = this.navigation_blocks[index - 1].prop('id');
          return false;
        }
      }
    );
    if(this.current_item != current_item) {
      this.current_item = current_item;
      this.setMenuActive();
    }
  }
}