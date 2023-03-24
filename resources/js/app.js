import '../../vendor/wire-elements/pro/resources/js/overlay-component.js'

import axios from 'axios';
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus'
import Tooltip from "@ryangjchandler/alpine-tooltip";

window.axios = axios;
window.Alpine = Alpine;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

Alpine.plugin(Tooltip);
Alpine.plugin(focus)

Alpine.start();
