<template>
<q-page>
  <div class="row">
    <div class="col-12 col-md-1"></div>
    <div class="col-12 col-md-10">
      <div class="row">
        <div class="col-12">
          <q-img
            v-if="movie.codeVideo"
            width="100%"
            :height="$q.screen.lt.sm ? '210px' : '450px'"
            :src="`https://img.youtube.com/vi/${movie.codeVideo}/maxresdefault.jpg`"
            spinner-color="white"
            fit="cover"
            spinner-size="40"
          >
            <div class="absolute-full text-subtitle2 flex flex-center">
              <q-icon name="o_play_circle" size="100px" color="white" />
            </div>
          </q-img>
        </div>
        <div v-if="!$q.screen.lt.md" class="col-12" style="position: relative; margin-top: -100px;">
          <q-img
            class="cursor-pointer"
            v-if="movie.image"
            :src="`${$url}../images/${movie.image}`"
            style="position: absolute; top: 0px; left: 15%; transform: translate(-50%, -15%);"
            width="15%"
          />
          <div :class="`text-center text-white text-h${$q.screen.lt.md?6:5} text-bold`">
            {{movie.title}}
          </div>
          <div class="text-center">
            <q-chip color="orange text-white">{{movie.clasificacion}}</q-chip>
            <q-chip color="white text-white" outline>{{movie.duracion}} Min</q-chip>
          </div>
        </div>
        <div v-else class="col-12">
          <div class="row">
            <div class="col-5 text-right" style="position: relative; margin-top: -70px">
              <q-img
                class="cursor-pointer"
                v-if="movie.image"
                :src="`${$url}../images/${movie.image}`"
                width="80%"
              />
            </div>
            <div class="col-7">
              <div :class="`text-center text-black text-h${$q.screen.lt.md?6:5} text-bold`">
                {{movie.title}}
              </div>
              <div class="text-center">
                <q-chip color="orange text-white">{{movie.clasificacion}}</q-chip>
                <q-chip color="black text-black" outline>{{movie.duracion}} Min</q-chip>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4 q-pa-xs" v-if="$q.screen.lt.md">
          <div class="text-red-8 text-bold" :style="$q.screen.lt.md?'':`margin-top: 37%`">
            <q-btn
              outline
              color="grey-5"
              label="Ver ficha de pelicula"
              class="text-white full-width"
              @click="visible=!visible"
            />
          </div>
          <q-slide-transition>
          <div v-show="visible">
            <div class="text-red-8 text-bold">TITULO ORIGINAL</div>
            <q-separator />
            <div class="text-grey text-subtitle2">{{movie.title}}</div>
            <div class="text-red-8 text-bold">DIRECTOR</div>
            <q-separator />
            <div class="text-grey text-subtitle2" v-html="movie.director"></div>
            <div class="text-red-8 text-bold">REPARTO</div>
            <q-separator />
            <div class="text-grey text-subtitle2" v-html="movie.reparto"></div>
            <div class="text-red-8 text-bold">SINOPSIS</div>
            <q-separator />
            <div class="text-grey text-subtitle2" v-html="movie.sinopsis" style="height: 200px; overflow-y: auto;"></div>
          </div>
          </q-slide-transition>
        </div>
        <div class="col-12 col-md-4 q-pa-xs" v-else>
          <div class="text-red-8 text-bold" :style="$q.screen.lt.md?'':`margin-top: 37%`">
          </div>
          <div class="text-red-8 text-bold">TITULO ORIGINAL</div>
          <q-separator />
          <div class="text-grey text-subtitle2">{{movie.title}}</div>
          <div class="text-red-8 text-bold">DIRECTOR</div>
          <q-separator />
          <div class="text-grey text-subtitle2" v-html="movie.director"></div>
          <div class="text-red-8 text-bold">REPARTO</div>
          <q-separator />
          <div class="text-grey text-subtitle2" v-html="movie.reparto"></div>
          <div class="text-red-8 text-bold">SINOPSIS</div>
          <q-separator />
          <div class="text-grey text-subtitle2" v-html="movie.sinopsis" style="height: 200px; overflow-y: auto;"></div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-1"></div>
  </div>
  <pre>{{movie}}</pre>
</q-page>
</template>
<script>
export default {
  name: 'SalePage',
  data () {
    return {
      visible: false,
      movie: {}
    }
  },
  created () {
    this.$axios.get('movies/' + this.$route.params.id).then(response => {
      this.movie = response.data
      this.movie.codeVideo = this.movie.urlVideo.split('/')[3]
    })
  }
}
</script>
<style scoped>

</style>
