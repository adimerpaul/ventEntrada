import { boot } from 'quasar/wrappers'
import axios from 'axios'
import { useCounterStore } from 'stores/example-store'
import moment from 'moment'
import { Alert } from 'src/addons/Alert'
import UniversalSocialauth from 'universal-social-auth'
// Be careful when using SSR for cross-request state pollution
// due to creating a Singleton instance here;
// If any client changes this (global) instance, it might be a
// good idea to move this instance creation inside of the
// "export default () => {}" function below (which runs individually
// for each client)
const options = {
  providers: {
    google: {
      clientId: '1035253398517-pno89s8jidafklhnpmurmttlfgrheeoj.apps.googleusercontent.com',
      redirectUri: `${import.meta.env.VITE_API_FRONT}auth/google/callback`
    },
    facebook: {
      clientId: '************',
      redirectUri: 'https://myapp.com/auth/facebook/callback'
    }
  }
}

const Oauth = new UniversalSocialauth(axios, options)
const api = axios.create({ baseURL: 'https://api.example.com' })

export default boot(({ app }) => {
  app.config.globalProperties.$Oauth = Oauth
  // for use inside Vue files (Options API) through this.$axios and this.$api
  app.config.globalProperties.$store = useCounterStore()
  app.config.globalProperties.$alert = Alert
  app.config.globalProperties.$axios = axios.create({ baseURL: import.meta.env.VITE_BACK_API })
  app.config.globalProperties.$filters = {
    dateDmY (fecha) {
      const meses = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Set', 'Nov', 'Dic']
      const mes = meses[moment(String(fecha)).format('MM') - 1]
      if (!fecha) return ''
      const date = moment(String(fecha)).format('DD') + ' ' + mes + ' ' + moment(String(fecha)).format('YYYY')
      return date
    },
    dateDay (fecha) {
      const dias = ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab']
      const dia = dias[moment(String(fecha)).format('d')]
      // const date = dias[dia]
      return dia
    },
    dateTime (fecha) {
      if (!fecha) return ''
      const date = moment(String(fecha)).format('hh:mm A')
      return date
    }
  }
  app.config.globalProperties.$url = import.meta.env.VITE_BACK_API
  // ^ ^ ^ this will allow you to use this.$axios (for Vue Options API form)
  //       so you won't necessarily have to import axios in each vue file

  app.config.globalProperties.$api = api
  // ^ ^ ^ this will allow you to use this.$api (for Vue Options API form)
  //       so you can easily perform requests against your app's API
})

export { api }
