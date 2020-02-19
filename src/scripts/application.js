import $ from 'jquery';
import 'foundation-sites';
import './modules';
import '../styles/style.scss';

__webpack_public_path__ = myAjax.dev_server_url;

/* Your code here */

$(document).ready(function($) {

  $(this).foundation();
  
});

module.hot && module.hot.accept();