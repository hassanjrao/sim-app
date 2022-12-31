<template>

    <div class="content">


        <div class="row">

            <div class="col-lg-4">

                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Multiple Sims Search
                        </h3>

                    </div>

                    <div class="block-content block-content-full">


                        <div class="row justify-content-between">
                            <div class="col-lg-12">
                                <input type="text" class="form-control" placeholder="Scan Sim" v-model.trim="scannedSim"
                                    @keyup.enter="scanSim">
                            </div>
                        </div>
                    </div>


                </div>


            </div>


            <div class="col-lg-8">

                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Sims (<span id="totalSims">{{ simsScanned.length }}</span>)
                        </h3>

                    </div>

                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                        <div class="table-responsive" style="height: 400px">

                            <table class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Sim Number</th>
                                        <th>Store Name</th>
                                        <th>Store Id</th>
                                        <th>Identity</th>
                                        <th>Action</th>
                                    </tr>

                                </thead>


                                <tbody>
                                    <tr v-for="(sim, index) in simsScanned" :key="index">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ sim.sim_number }}</td>
                                        <!-- <td>
                                            <span v-if="sim.status == 'Success'"
                                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">
                                                Success
                                            </span>
                                            <span v-else-if="sim.status == 'Failed'"
                                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">
                                                Failed
                                            </span>

                                        </td>-->
                                        <td>{{ sim.store_name }}</td>
                                        <td>{{ sim.store_id }}</td>

                                        <td>{{ sim.sim_identity }}</td>

                                        <td>
                                            <button v-if="sim.status == 'Failed' || sim.status == NULL"
                                                class="btn btn-danger btn-sm" @click="removeSim(index)">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <div v-else>
                                                -
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>


            </div>

        </div>





    </div>

</template>

<script>
import shared from '../shared/shared'

export default {

    data() {
        return {
            loading: false,
            simsScanned: [],
            scannedSim: '',
            baseURL: '/employee/multiple-sim-search',
            lat: '',
            lng: ''
        }
    },

    methods: {
        removeSim(index) {
            this.simsScanned.splice(index, 1);
        },

        scanSim() {

            console.log(this.scannedSim);

            if (this.scannedSim === '') {
                console.log('Please enter a sim number');
                this.showStatus('Please enter a sim number', 'error')
                return;
            }

            let simScanned = this.simsScanned.findIndex(sim => sim.sim_number == this.scannedSim);

            console.log(simScanned);

            if (simScanned !== -1) {
                console.log('Sim already scanned');
                this.showStatus('Sim already scanned', 'error')
                return;
            }

            this.simsScanned.unshift({
                'sim_number': this.scannedSim,
                'store_name': 'Scanning..',
                'store_id': '',
                'sim_identity': ''
            });

            let scannedSim = this.scannedSim;

            this.scannedSim = '';

            console.log('Scanning sim');

            axios.post(this.baseURL + "/scan-sim", {
                sim_number: scannedSim,
                lat: this.lat,
                lng: this.lng

            })
                .then(response => {
                    this.loading = false;

                    this.simsScanned[0].store_name = response.data.data.store_name;
                    this.simsScanned[0].store_id = response.data.data.store_id;
                    this.simsScanned[0].sim_identity = response.data.data.sim_identity;

                    if (response.data.status == 'Failed') {
                        this.showStatus(response.data.message, "error");
                    } else {

                        this.showStatus(response.data.message, "success");
                    }
                })
                .catch(error => {
                    this.loading = false;
                    this.simsScanned[0].status = error.response.data.status;
                    this.simsScanned[0].message = error.response.data.message;

                    this.showStatus(error.response.data.message, "error");
                })



        }
    },

    created() {
        this.showStatus = shared.showStatus;


        const success = (position) => {
            this.lat = position.coords.latitude;
            this.lng = position.coords.longitude;


            // Do something with the position
        };

        const error = (err) => {
            console.log(err)
        };

        // This will open permission popup
        navigator.geolocation.getCurrentPosition(success, error);
    }
}
</script>

<style lang="scss" scoped>
.loader {
    border: 16px solid #f3f3f3;
    border-top: 16px solid #3498db;
    border-radius: 50%;
    width: 36px;
    height: 36px;
    margin: auto;
    // margin-top: 40px;
    animation: spin 0.5s linear infinite;
}

.vDialoge {
    z-index: 2222222 !important;
}

.scroll {
    overflow-y: scroll
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }

}
</style>
