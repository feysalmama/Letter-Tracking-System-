import "./bootstrap";
import "./init-alpine";

import { Carousel, initTE } from "tw-elements";
import Alpine from "alpinejs";

window.Alpine = Alpine;
initTE({ Carousel });
Alpine.start();
