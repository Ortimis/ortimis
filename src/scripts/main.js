/**
 * Manage global libraries like jQuery or THREE from the package.json file
 */
var $ = require( 'jquery' );

// Import libraries
import 'slick-carousel';


// Import custom modules
import Navigation from './modules/navigation.js';
import App from'./modules/app.js';
import Carousel from './modules/carousel.js';

const navigation = new Navigation();
const app = new App();
const carousel = new Carousel();
