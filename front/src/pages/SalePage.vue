<template>
<q-page>
  <div class="row">
    <div class="col-12 col-md-1"></div>
    <div class="col-12 col-md-10">
      <div class="row">
        <div class="col-12">
          <q-img
            v-if="movie.codeImg"
            width="100%"
            :height="$q.screen.lt.sm ? '210px' : '450px'"
            :src="`https://img.youtube.com/vi/${movie.codeImg}/maxresdefault.jpg`"
            spinner-color="white"
            fit="cover"
            spinner-size="40"
            @click="openVideo"
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
          <div class="text-primary text-bold" :style="$q.screen.lt.md?'':`margin-top: 37%`">
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
            <div class="text-primary text-bold">
              TITULO ORIGINAL
            </div>
            <q-separator />
            <div class="text-grey text-subtitle2">{{movie.title}}</div>
            <div class="text-primary text-bold">DIRECTOR</div>
            <q-separator />
            <div class="text-grey text-subtitle2" v-html="movie.director"></div>
            <div class="text-primary text-bold">REPARTO</div>
            <q-separator />
            <div class="text-grey text-subtitle2" v-html="movie.reparto"></div>
            <div class="text-primary text-bold">SINOPSIS</div>
            <q-separator />
            <div class="text-grey text-subtitle2" v-html="movie.sinopsis" style="height: 200px; overflow-y: auto;"></div>
          </div>
          </q-slide-transition>
        </div>
        <div class="col-12 col-md-4 q-pa-xs" v-else>
          <div class="text-primary text-bold" :style="$q.screen.lt.md?'':`margin-top: 37%`">
          </div>
          <div class="text-primary text-bold">
            TITULO ORIGINAL
            <q-btn icon="refresh" flat @click="searchCarteleraGet" />
          </div>
          <q-separator />
          <div class="text-grey text-subtitle2">{{movie.title}}</div>
          <div class="text-primary text-bold">DIRECTOR</div>
          <q-separator />
          <div class="text-grey text-subtitle2" v-html="movie.director"></div>
          <div class="text-primary text-bold">REPARTO</div>
          <q-separator />
          <div class="text-grey text-subtitle2" v-html="movie.reparto"></div>
          <div class="text-primary text-bold">SINOPSIS</div>
          <q-separator />
          <div class="text-grey text-subtitle2 text-justify" v-html="movie.sinopsis"
               style="height: 200px; overflow-y: auto;"></div>
        </div>
        <div class="col-12 col-md-8">
          <q-card>
            <q-tabs
              v-model="tabDay"
              dense
              class="text-grey"
              active-color="primary"
              indicator-color="primary"
              align="justify"
              narrow-indicator
            >
              <q-tab v-for="(cartelera, index) in carteleras" :key="index"
                     :name="cartelera.fecha" no-caps>
                <div class="text-bold">{{ $filters.dateDay(cartelera.fecha) }}</div>
                {{ $filters.dateDmY(cartelera.fecha) }}
              </q-tab>
            </q-tabs>
            <q-separator />
            <q-tab-panels v-model="tabDay" animated>
              <q-tab-panel v-for="(cartelera, index) in carteleras" :key="index" :name="cartelera.fecha">
                <div class="text-bold"><span class="text-primary">Dirección</span> Av. Tacna, Jaén y Tomás Frias Ciudad Oruro, Bolivia</div>
                <div class="text-bold"><span class="text-primary">Selecciona tu horario</span></div>
                <div class="row">
                  <div class="col-12 col-md-4 q-pa-xs" v-for="(horario, index) in cartelera.horarios" :key="index">
                    <q-card >
                      <q-card-section class="row items-center q-pa-none">
                        <div class="col-12 text-center">
                          <div class="text-bold text-black">
                            <q-chip :label="`${horario.idioma}`" size="10px" color="primary" text-color="white" dense/>
                            <q-chip :label="`${horario.formato}`" size="10px" color="primary" text-color="white" dense/>
                            <q-chip :label="`S${horario.sala.nro}`" size="10px" color="primary" text-color="white" dense/>
                            <q-chip :label="`Sub`" v-if="horario.subtitulada=='SI'" size="10px" color="primary" text-color="white" dense/>
                          </div>
                        </div>
                      </q-card-section>
                      <q-separator />
                      <q-card-section class="row items-center q-pa-none">
                        <q-btn
                          :loading="loading"
                          color="primary"
                          class="q-pa-xs full-width text-bold"
                          @click="dialogPantallaClick(horario)"
                          no-caps
                          dense
                        >
                          <q-chip :label="`${horario.price.precio}Bs`" size="12px" color="white" class="text-bold" dense/>
                          {{$filters.dateTime(horario.horaInicio)}}
                        </q-btn>
                      </q-card-section>
                    </q-card>
<!--                    <pre>{{horario}}</pre>-->
                  </div>
                </div>
              </q-tab-panel>
            </q-tab-panels>
          </q-card>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-1"></div>
  </div>
  <q-dialog v-model="dialogPantalla" full-width>
    <q-card class="q-pa-xs">
      <q-card-section class="row items-center q-pa-none">
        <div class="col-12 text-center">
          <div class="text-bold text-black">
<!--            <q-chip :label="`${horario.idioma}`" size="10px" color="primary" text-color="white" dense/>-->
<!--            <q-chip :label="`${horario.formato}`" size="10px" color="primary" text-color="white" dense/>-->
<!--            <q-chip :label="`S${horario.sala.nro}`" size="10px" color="primary" text-color="white" dense/>-->
<!--            <q-chip :label="`Sub`" v-if="horario.subtitulada=='SI'" size="10px" color="primary" text-color="white" dense/>-->
<!--            <q-btn-->
<!--              color="primary"-->
<!--              class="q-pa-xs text-bold"-->
<!--              no-caps-->
<!--              dense-->
<!--            >-->
<!--              <q-chip :label="`${horario.price.precio}Bs`" size="12px" color="white" class="text-bold" dense/>-->
<!--              {{$filters.dateTime(horario.horaInicio)}}-->
<!--            </q-btn>-->
            {{selecionados.length}} Asientos- {{total}}Bs
          </div>
        </div>
      </q-card-section>
      <q-separator />
      <q-card-section class="q-pa-none">
        <div class="text-bold text-white text-center bg-primary shadow-10" style="letter-spacing: 10px;">
          PANTALLA
        </div>
        <div class="row">
          <div class="col-12 q-pt-md">
            <q-markup-table :separator="'cell'" flat bordered>
<!--              <thead>-->
              <tr>
                <th></th>
                <th v-for="(c,i) in parseInt(sala.columnas)" :key="i">{{sala.columnas-c+1}}</th>
              </tr>
<!--              </thead>-->
<!--              <tbody>-->
              <tr v-for="(f,i) in parseInt(sala.filas)" :key="i">
                <th>{{letra[i+1]}}</th>
                <td style="padding: 0px;margin: 0px" v-for="(c,j) in parseInt(sala.columnas)" :key="j">
                  <q-btn dense color="green-6" class="full-width" :label="letra[i+1]+'-'+(sala.columnas-c+1).toString()" v-if="seats[sala.columnas*(f-1)+(c-1)]['activo']=='ACTIVO'" @click="seleccionar(seats[sala.columnas*(f-1)+(c-1)])" />
<!--                  <q-btn color="green-6" class="full-width" :label="letra[i+1]+'-'+(seats.columnas-c+1).toString()" v-if="seats[seats.columnas*(f-1)+(c-1)]['activo']=='LIBRE'" @click="seleccionar(hour,seats[seats.columnas*(f-1)+(c-1)])"/>-->
                  <q-btn dense color="red-6" class="full-width"  v-else-if="seats[sala.columnas*(f-1)+(c-1)]['activo']=='OCUPADO'" disable/>
<!--                  <q-btn color="yellow-6" class="full-width"  v-else-if="seats[seats.columnas*(f-1)+(c-1)]['activo']=='RESERVADO'"/>-->
                  <q-btn dense color="blue-6" class="full-width" :label="letra[i+1]+'-'+(sala.columnas-c+1).toString()" v-else-if="seats[sala.columnas*(f-1)+(c-1)]['activo']=='SELECCIONADO'" @click="seleccionar(seats[sala.columnas*(f-1)+(c-1)])"/>
                  <q-btn dense color="grey-6" class="full-width" v-else disable/>
                </td>
              </tr>
<!--              </tbody>-->
            </q-markup-table>
          </div>
        </div>
<!--        <pre>{{sala}}</pre>-->
<!--        <pre>{{seats}}</pre>-->
<!--        <pre>{{selecionados}}</pre>-->
      </q-card-section>
    </q-card>
  </q-dialog>
<!--  <pre>{{movie}}</pre>-->
</q-page>
</template>
<script>
export default {
  name: 'SalePage',
  data () {
    return {
      visible: false,
      movie: this.$store.movie,
      carteleras: [],
      tabDay: '',
      dialogPantalla: false,
      horario: {},
      seats: [],
      price: {
        precio: 0
      },
      loading: false,
      sala: {
        filas: 0,
        columnas: 0
      },
      letra: ['', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB']
    }
  },
  created () {
    this.$axios.get('movies/' + this.$route.params.id).then(response => {
      this.movie = response.data
    })
    this.searchCarteleraGet()
  },
  methods: {
    seleccionar (seat) {
      if (seat.activo === 'SELECCIONADO') {
        seat.activo = 'ACTIVO'
        // this.$api.post('momentaneoDelete',{
        //   user_id:1,
        //   programa_id:funcion.id,
        //   fila:seat.fila,
        //   columna:seat.columna,
        //   letra:seat.letra,
        // }).then(res=>{
        //   this.loading=false
        //   this.myMomentaneo()
        // })
      } else {
        if (this.selecionados.length >= 4) {
          this.$alert.error('Solo puede seleccionar 4 asientos')
          return
        }
        seat.activo = 'SELECCIONADO'
        // this.$api.post('momentaneo',{
        //   user_id:this.store.user.id,
        //   programa_id:funcion.id,
        //   fila:seat.fila,
        //   columna:seat.columna,
        //   letra:seat.letra,
        //   fecha:funcion.horaInicio,
        //   pelicula:funcion.movie.nombre+' '+funcion.movie.formato,
        //   pelicula_id:funcion.movie.id,
        //   precio:funcion.price.precio,
        //   promo:funcion.price.promo=='SI'?true:false
        // }).then(res=>{
        //   this.loading=false
        //   this.myMomentaneo()
        //   if (res.data==1){
        //     this.clickSala(funcion)
        //   }
        // })
      }
      // console.log(seat)
      // this.hour.sala.seats[indice]['activo']
      //   this.temporal.push(asiento)
    },
    async dialogPantallaClick (horario) {
      // console.log(horario)
      this.horario = horario
      this.loading = true
      this.sala = await horario.sala
      this.price = await horario.price
      this.$axios.get('seatsSearch/' + this.horario.id).then(response => {
        this.seats = response.data
        this.dialogPantalla = true
        this.loading = false
      })
    },
    searchCarteleraGet () {
      this.loading = true
      this.$axios.get('searchCatelera/' + this.$route.params.id).then(response => {
        this.carteleras = response.data
        this.tabDay = this.carteleras[0].fecha
      }).finally(() => {
        this.loading = false
      })
    },
    openVideo () {
      this.$q.dialog({
        title: 'Trailer',
        fullWidth: true,
        fullHeight: 500,
        message: `<iframe width="100%" height="500px" src="https://www.youtube.com/embed/${this.movie.codeImg}" title="${this.movie.title}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>`,
        html: true
      })
    }
  },
  computed: {
    selecionados () {
      return this.seats.filter(seat => seat.activo === 'SELECCIONADO')
    },
    total () {
      return this.selecionados.length * this.price.precio
    }
  }
}
</script>
<style scoped>

</style>
