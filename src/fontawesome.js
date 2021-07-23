import { library } from '@fortawesome/fontawesome-svg-core'
import { faAngleRight } from '@fortawesome/free-solid-svg-icons'
import { faAngleLeft } from '@fortawesome/free-solid-svg-icons'
import { faEnvelope } from '@fortawesome/free-solid-svg-icons'
import { faMapMarkerAlt } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

export function initFontAwesome(vueApp) {
  library.add(faAngleRight, faAngleLeft, faEnvelope, faMapMarkerAlt)

  vueApp.component('Icon', FontAwesomeIcon);
}
