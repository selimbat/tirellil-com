import { library } from '@fortawesome/fontawesome-svg-core'
import { faEnvelope } from '@fortawesome/free-solid-svg-icons'
import { faMapMarkerAlt } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

export function initFontAwesome(vueApp) {
  library.add(faEnvelope, faMapMarkerAlt)

  vueApp.component('Icon', FontAwesomeIcon);
}
