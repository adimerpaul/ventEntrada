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
      <q-carousel-slide :name="i++" v-for="(c,i) in carousels" :key="i++" class="cursor-pointer"
                        :img-src="$q.screen.lt.md ?`${$url}../images/${c.imageResponsive}`:`${$url}../images/${c.image}`"
      />
    </q-carousel>
    <div class="row q-pa-xs">
      <div class="col-12">
        <div class="text-h6 text-center text-bold">
          CARTELERA SEMANAL
        </div>
      </div>
      <div class="col-12">
        <q-virtual-scroll
          :items="programacion"
          virtual-scroll-horizontal
          v-slot="{ item, index }"
        >
          <div
            :key="index"
            style=" width: 200px; margin: 10px; display: inline-block; vertical-align: top;"
          >
              <q-card flat>
                <div v-if="item.fechaEstreno!=null" class="text-center bg-red-8 text-white">Estreno</div>
                <div v-if="item.fechaEstreno==null" class="text-center bg-white text-white no-select">a</div>
                <q-img :src="`${$url}../images/${item.image}`" width="200px" height="300px" class="cursor-pointer">
                  <div class="absolute-bottom">
<!--                    <div class="text-h6">Our Changing Planet</div>-->
                    <div class="text-subtitle2 text-center">{{ item.title }}</div>
                  </div>
                </q-img>
                <q-card-actions class="q-pa-none">
                  <q-btn label="Comprar" color="red-8" class="full-width" icon="o_shopping_cart" no-caps/>
                </q-card-actions>
              </q-card>
          </div>
        </q-virtual-scroll>
      </div>
      <div class="col-12">
        <pre>{{programacion}}</pre>
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
      heavyList: []
    }
  },
  created () {
    for (let i = 0; i < 100; i++) {
      this.heavyList.push({
        label: 'Option ' + (i + 1),
        class: i % 2 === 0 ? 'q-pa-md self-center bg-grey-2 text-black' : 'q-pa-lg bg-black text-white'
      })
    }
    this.programacionGet()
    this.carouselsGet()
  },
  methods: {
    programacionGet () {
      this.$axios.get('disponibles').then(response => {
        this.programacion = response.data
      })
    },
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
      })
    }
  }
}
</script>
