<template>
  <q-page>
    <q-carousel
      animated
      v-model="slide"
      arrows
      :height="$q.screen.lt.md ? '35vh' : '45vh'"
      navigation
      navigation-icon="radio_button_unchecked"
      control-type="outline"
      control-color="white"
      control-text-color="grey-8"
      autoplay
      infinite
    >
      <q-carousel-slide :name="i++" v-for="(c,i) in carousels" :key="i++"
                        :img-src="$q.screen.lt.md ?`${$url}../images/${c.imageResponsive}`:`${$url}../images/${c.image}`"
      />
    </q-carousel>
    <div class="row q-pa-xs">
      <div class="col-12">
        <div class="text-h5">
          CARTELERA SEMANAL
        </div>
      </div>
      <div class="col-12">
        <div style="position: relative; width: 100%; overflow: hidden;border: 1px solid #ccc;">
          <q-icon name="chevron_left" size="2.5rem" color="red-3"
                  style="position: absolute; left: 0; top: 50%;
              transform: translateY(-50%);z-index: 1;background: rgba(128,128,128,0.2);"
                  @click="scrollMinus" class="cursor-pointer"/>
          <q-scroll-area ref="scrollAreaRef" style="height: 135px; width: 100%; overflow: auto;">
            <div class="row no-wrap">
              <q-card v-for="r in rubros" :key="r.id"
                      style="width: 140px;height: 120px;overflow: hidden"
                      class="q-ma-xs bg-blue-1 cursor-pointer" flat bordered
              >
                <q-card-section class="text-center">
                  <q-avatar color="white" text-color="grey" :icon="r.icono" />
                  <div class="">{{ r.nombre }}</div>
                </q-card-section>
              </q-card>
            </div>
          </q-scroll-area>
          <q-icon name="chevron_right" size="2.5rem" color="red-3"
                  style="position: absolute; right: 0; top: 50%;
              transform: translateY(-50%);z-index: 1;background: rgba(128,128,128,0.2);"
                  @click="scrollMore" class="cursor-pointer"/>
        </div>
      </div>
    </div>
  </q-page>
</template>

<script>
export default {
  name: 'IndexPage',
  data () {
    return {
      slide: 1,
      carousels: [],
      programacion: [],
      rubros: []
    }
  },
  created () {
    for (let i = 0; i < 1000; i++) {
      this.rubros.push({
        id: i,
        nombre: `Rubro ${i}`,
        icono: 'fas fa-utensils'
      })
    }
    this.carouselsGet()
  },
  methods: {
    scrollMinus () {
      const number = this.$refs.scrollAreaRef.getScrollPosition('horizontal').left - 300
      this.$refs.scrollAreaRef.setScrollPosition('horizontal', number, 300)
    },
    scrollMore () {
      const number = this.$refs.scrollAreaRef.getScrollPosition('horizontal').left + 300
      this.$refs.scrollAreaRef.setScrollPosition('horizontal', number, 300)
    },
    carouselsGet () {
      this.$axios.get('carousels').then(response => {
        this.carousels = response.data
        console.log(this.carousels)
      })
    }
  }
}
</script>
