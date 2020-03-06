<template>
  <v-container>
    <v-row justify="center">
      <v-dialog v-model="imagingRequestDialog" persistent max-width="1500px">
        <template v-slot:activator="{ on }">
          <v-btn absolute dark fab top right color="primary" v-on="on">
            <v-icon>mdi-plus</v-icon>
          </v-btn>
        </template>
        <v-card>
          <v-toolbar>
            <v-toolbar-title>Imaging Request</v-toolbar-title>
          </v-toolbar>
          <v-card-text>
            <v-form>
              <v-container>
                <v-row>
                  <v-col cols="12" sm="5">
                    <v-text-field label="Provisional Diagnosis"></v-text-field>
                    <v-row>
                      <v-col cols="12" sm="6">
                        <header>Patient Condition</header>
                        <v-switch
                          v-for="condition in patientConditions"
                          :key="condition.id"
                          inset
                          :label="condition.title"
                          :value="condition.id"
                        ></v-switch>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <header>Examination Requested</header>
                        <v-switch
                          v-for="imaging in imagingTests"
                          :key="imaging.key"
                          inset
                          :label="imaging.description"
                          :value="imaging.description"
                        ></v-switch>
                      </v-col>
                    </v-row>
                  </v-col>
                  <v-col cols="12" sm="6" justify>
                    <v-textarea class="mx-2" label="Clinical Information" rows="1"></v-textarea>
                    <v-textarea
                      outlined
                      v-model="clinicalInformation"
                      name="input-7-4"
                      rows="16"
                      label="Procedure"
                    ></v-textarea>
                  </v-col>
                </v-row>
              </v-container>
            </v-form>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="blue darken-1" text @click="imagingRequestDialog = false">Cancel</v-btn>
            <v-btn color="blue darken-1" text @click="labRequestDialog = false">Save</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-row>
  </v-container>
</template>

<script>
export default {
  name: "ImagingRequest",
  data: () => ({
    imagingTests: [],
    clinicalInformation: "",
    patientConditions: [
      { id: "1", title: "Any Known Allergies?", value: "allergies" },
      { id: "2", title: "Hyberthyroidism?", value: "hyberthyroidism" },
      { id: "3", title: "Intramedullary Nail?", value: "intramedullary_nail" },
      { id: "4", title: "Cardiac Pacemaker?", value: "cardiac_pacemaker" },
      {
        id: "5",
        title: "Carebral Aneurysm Clip?",
        value: "carebral_aneurysm_clip"
      },
      { id: "6", title: "Joint Replacement?", value: "joint_replacement" }
    ],
    priority: "0",
    note: "",
    imagingRequestDialog: false
  }),
  methods: {
    getLookupLabTestAttributes() {
      axios
        .get("/api/attributeExamination/", {
          params: {
            type: "IMAGINGTEST"
          }
        })
        .then(result => {
          this.imagingTests = result.data.data;
        })
        .catch(err => {
          console.error(err);
        });
    }
  },
  computed: {},
  created() {
    this.getLookupLabTestAttributes();
  }
};
</script>

<style>
</style>
