---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_fc1e4f6a697e3c48257de845299b71d5 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": "036450c9-989e-4e07-86d0-f15c14849012",
            "firstName": "Ford Schulist",
            "middleName": "Ima Effertz",
            "lastName": "Kelton Kuvalis",
            "email": "yost.danielle@example.org",
            "roles": []
        },
        {
            "id": "0387677c-09f7-423e-9628-3596737e6836",
            "firstName": "Justyn Baumbach",
            "middleName": "Rita Bartell V",
            "lastName": "Michaela Eichmann I",
            "email": "christian.maggio@example.org",
            "roles": []
        },
        {
            "id": "06b73762-19f5-4f7a-b8b5-0b685fbd283a",
            "firstName": "Vernie Runolfsson",
            "middleName": "Gudrun Cummerata",
            "lastName": "Shanel Spinka",
            "email": "stan22@example.org",
            "roles": []
        },
        {
            "id": "093c8c15-e623-4b02-ae07-dcb0fa64725a",
            "firstName": "Jamar Toy",
            "middleName": "Prof. Allie Flatley",
            "lastName": "Miss Shayna Schamberger",
            "email": "jkihn@example.com",
            "roles": []
        },
        {
            "id": "09c89e38-b988-4505-ba2c-16731b4135fc",
            "firstName": "Talon Huels",
            "middleName": "Delphia Watsica PhD",
            "lastName": "Miss Kamille Dicki PhD",
            "email": "miller.david@example.net",
            "roles": []
        },
        {
            "id": "0f029221-c8a6-48e7-835f-5e9c0d1fcfc9",
            "firstName": "Dr. Logan Goodwin",
            "middleName": "Amina Mills",
            "lastName": "Nestor Jacobi I",
            "email": "pierre.homenick@example.com",
            "roles": []
        },
        {
            "id": "105634d7-522c-4d91-bfc6-c32649a9ab66",
            "firstName": "Prof. Shanel Lockman",
            "middleName": "Consuelo Lubowitz",
            "lastName": "Prof. Rusty Hayes",
            "email": "stark.fay@example.com",
            "roles": []
        },
        {
            "id": "1092fcd8-7f19-4068-9299-c45029970867",
            "firstName": "Rhiannon Bogisich",
            "middleName": "Magdalen Luettgen",
            "lastName": "Rosetta Weimann",
            "email": "roger.pacocha@example.net",
            "roles": []
        },
        {
            "id": "10d7f50e-5b84-4c0d-83b4-42236ff09b43",
            "firstName": "Mary Murray",
            "middleName": "Nicholas O'Kon",
            "lastName": "Dr. Amos Altenwerth Jr.",
            "email": "carleton89@example.com",
            "roles": []
        },
        {
            "id": "1413703f-6e07-486a-b117-96fb21ba39e6",
            "firstName": "Adelia Simonis",
            "middleName": "Dr. Elmer O'Connell PhD",
            "lastName": "Mr. Rigoberto Gibson",
            "email": "edouglas@example.com",
            "roles": []
        },
        {
            "id": "14bb8e53-015d-4a3b-8d76-d15fe78cccfe",
            "firstName": "Bradford Gutmann",
            "middleName": "Lauriane Bergstrom",
            "lastName": "Prof. Adrain Upton",
            "email": "buckridge.makenna@example.org",
            "roles": []
        },
        {
            "id": "14e38e17-831e-4bce-9d85-6b11d9ebe6dc",
            "firstName": "Judd Bogisich",
            "middleName": "Mellie Kassulke",
            "lastName": "Syble Mraz",
            "email": "beier.arlene@example.net",
            "roles": []
        },
        {
            "id": "1752b7f7-e067-47dc-9271-e410d8d91cdd",
            "firstName": "Dr. Joe Balistreri IV",
            "middleName": "Stewart Walker",
            "lastName": "Nicolas Kub",
            "email": "christiana.nolan@example.org",
            "roles": []
        },
        {
            "id": "17562fef-7186-4c00-902d-e0211f9c56fe",
            "firstName": "Rudolph Reilly",
            "middleName": "Prof. Johnathan Kuhlman",
            "lastName": "Kenna McCullough IV",
            "email": "kulas.chaya@example.net",
            "roles": []
        },
        {
            "id": "17a67239-b80c-412e-9f6c-2dd61e28029c",
            "firstName": "Santiago Tromp",
            "middleName": "Phoebe Hermiston",
            "lastName": "Mr. Gabe Thiel",
            "email": "olin21@example.com",
            "roles": []
        },
        {
            "id": "1b641aed-2635-487c-bad5-44c3a448cc1d",
            "firstName": "Mckenzie Lockman",
            "middleName": "Angeline Ryan",
            "lastName": "Joana Bechtelar",
            "email": "zella.fritsch@example.com",
            "roles": []
        },
        {
            "id": "1dce6a70-12e1-447f-a792-8d130c42ab53",
            "firstName": "Chelsey Conroy",
            "middleName": "Mr. Dexter Schaefer III",
            "lastName": "Lindsey Smith",
            "email": "crystal59@example.net",
            "roles": []
        },
        {
            "id": "20a825f1-8e96-4b25-98bb-5e67ff0a76ab",
            "firstName": "Lester Sauer",
            "middleName": "Mr. Jovan Williamson",
            "lastName": "Mr. Sven Green",
            "email": "kasey90@example.com",
            "roles": []
        },
        {
            "id": "21b6fa55-3a49-4579-ac2a-2aee5d6db107",
            "firstName": "Darryl Green",
            "middleName": "Orlando Blick",
            "lastName": "Dr. Malinda Glover",
            "email": "dolly.walter@example.net",
            "roles": []
        },
        {
            "id": "229c6b67-0a99-4f83-8b70-71b4eb477fd7",
            "firstName": "Miss Maud Conn V",
            "middleName": "Katelin Larkin",
            "lastName": "Dr. Earlene Dickinson",
            "email": "labadie.irma@example.com",
            "roles": []
        },
        {
            "id": "28231e79-18a2-417c-9257-da5c8d82237c",
            "firstName": "Jasmin Skiles",
            "middleName": "Travis Keeling",
            "lastName": "Leon Bradtke",
            "email": "ogrimes@example.com",
            "roles": []
        },
        {
            "id": "2e505a80-6bf3-490e-9c9d-5036b59a85eb",
            "firstName": "Linda Boyle",
            "middleName": "Enoch Parisian",
            "lastName": "Dr. Vern Padberg III",
            "email": "kshlerin.dedric@example.net",
            "roles": []
        },
        {
            "id": "30c95b52-7c62-415a-b850-e5293816daab",
            "firstName": "Bryana Schaefer",
            "middleName": "Estelle Koelpin",
            "lastName": "Clara Adams",
            "email": "lawrence.schmidt@example.com",
            "roles": []
        },
        {
            "id": "325df56a-2e5b-4317-aafc-99968abd888d",
            "firstName": "Kim White",
            "middleName": "Miss Brenna Littel DVM",
            "lastName": "Prof. Anne Stehr",
            "email": "yasmine.nolan@example.org",
            "roles": []
        },
        {
            "id": "35b79c5a-10e8-4330-9d5d-d69b0829a9b9",
            "firstName": "Miss Orie Will PhD",
            "middleName": "Prof. Gordon Gislason",
            "lastName": "Anya Hand Sr.",
            "email": "rodriguez.bryce@example.org",
            "roles": []
        },
        {
            "id": "378dc9f3-ba70-4aa6-9e9f-720e63c3527c",
            "firstName": "Ms. Georgiana Quigley",
            "middleName": "Mr. Rasheed Stokes",
            "lastName": "Caitlyn Howell",
            "email": "sauer.micaela@example.org",
            "roles": []
        },
        {
            "id": "3b22ab32-4193-4f32-9137-27f29b35f386",
            "firstName": "Ms. Dawn Deckow",
            "middleName": "Prof. Reta Simonis DVM",
            "lastName": "Prof. Irwin Rowe DDS",
            "email": "olittel@example.com",
            "roles": []
        },
        {
            "id": "3f23cf02-ac78-4c80-884e-c11d29ec2094",
            "firstName": "Mrs. Felicita Strosin",
            "middleName": "Rachelle Metz Jr.",
            "lastName": "Toni Beer MD",
            "email": "mable.botsford@example.net",
            "roles": []
        },
        {
            "id": "4037a73a-fd74-488f-8dd3-9d6f15f5d30f",
            "firstName": "Sadye Williamson",
            "middleName": "Chris Abernathy",
            "lastName": "Miss Nia Konopelski V",
            "email": "opowlowski@example.net",
            "roles": []
        },
        {
            "id": "405110d4-710a-44bc-beb2-0a3fa466978d",
            "firstName": "Miss Lisa Stanton",
            "middleName": "Ora Zemlak",
            "lastName": "Miss Justina Turner",
            "email": "chuels@example.com",
            "roles": []
        },
        {
            "id": "4090b83a-0319-466d-b75b-166d82e75d27",
            "firstName": "Dr. Pamela Keebler",
            "middleName": "Garret Jerde",
            "lastName": "Prof. Marisol Gerlach IV",
            "email": "weissnat.elinor@example.net",
            "roles": []
        },
        {
            "id": "456c7bf3-f9ac-4328-976d-dc6ce1d05a3c",
            "firstName": "Unique O'Connell",
            "middleName": "Durward Armstrong",
            "lastName": "Vicenta Miller",
            "email": "matt.hill@example.org",
            "roles": []
        },
        {
            "id": "4f4ecb8b-8217-4bed-b69d-3c354dfdde11",
            "firstName": "Ashleigh Littel",
            "middleName": "Prof. Maurice Bailey",
            "lastName": "Fabiola Weimann",
            "email": "gabe60@example.org",
            "roles": []
        },
        {
            "id": "5274de6a-1ee5-4f42-b746-a1ba22c4aa95",
            "firstName": "Ellie Pfannerstill",
            "middleName": "Lilly Buckridge",
            "lastName": "Marilou Baumbach",
            "email": "uriel.luettgen@example.com",
            "roles": []
        },
        {
            "id": "52b437b7-bcd3-40dc-9427-c6305925231a",
            "firstName": "Opal Thiel DVM",
            "middleName": "Yasmin Rohan",
            "lastName": "Mrs. Gail Langosh",
            "email": "orn.cordie@example.net",
            "roles": []
        },
        {
            "id": "5552a75d-658f-427f-a939-a24fad7be792",
            "firstName": "Maxwell Von DVM",
            "middleName": "Lue Tillman",
            "lastName": "Shaniya Murray",
            "email": "feil.ari@example.org",
            "roles": []
        },
        {
            "id": "56034ffe-30bb-4a2a-9887-a58062a8f233",
            "firstName": "Miss Shirley Effertz",
            "middleName": "Prof. Jaeden Treutel MD",
            "lastName": "Miss Kathleen Stark",
            "email": "shanelle.feil@example.org",
            "roles": []
        },
        {
            "id": "57e5ccf3-5428-4d8a-802a-86b3990b3a00",
            "firstName": "Shaun Bashirian DDS",
            "middleName": "Maddison Strosin Sr.",
            "lastName": "Patsy Watsica",
            "email": "lonzo18@example.net",
            "roles": []
        },
        {
            "id": "58aa85df-96ae-412a-8365-f3d1db3f2d55",
            "firstName": "Vincenzo Satterfield DVM",
            "middleName": "Bella Kerluke III",
            "lastName": "Miss Jackie Christiansen II",
            "email": "monserrate49@example.com",
            "roles": []
        },
        {
            "id": "5a856496-a231-4e0d-9eca-212960b956a6",
            "firstName": "Robbie Denesik",
            "middleName": "Johnpaul Hackett",
            "lastName": "Prof. Nikolas Bosco IV",
            "email": "orval28@example.org",
            "roles": []
        },
        {
            "id": "62f3f300-f777-47a2-9414-5b0a1128b2f1",
            "firstName": "Ms. Katherine Ankunding Sr.",
            "middleName": "Otto Pouros",
            "lastName": "Dennis Rau",
            "email": "lenny.vandervort@example.com",
            "roles": []
        },
        {
            "id": "64d27481-9ca4-4282-bf08-e3d3276d0919",
            "firstName": "Thelma Hegmann DDS",
            "middleName": "Prof. Matilda Goldner DDS",
            "lastName": "Declan Jerde II",
            "email": "wiegand.pauline@example.net",
            "roles": []
        },
        {
            "id": "6dd079e9-8dd8-4100-8f60-f868c2d3d946",
            "firstName": "Imelda Blanda",
            "middleName": "Mrs. Oleta Hauck MD",
            "lastName": "Dr. Amir Hagenes PhD",
            "email": "collier.elyssa@example.org",
            "roles": []
        },
        {
            "id": "6f670b7f-a3b0-4427-8fa1-b42a0772668b",
            "firstName": "Murphy Wunsch",
            "middleName": "Maegan Stoltenberg DDS",
            "lastName": "Deshawn Rath",
            "email": "joaquin.moore@example.net",
            "roles": []
        },
        {
            "id": "70bbd6fd-0d97-4cb4-80b8-54bcde9b45fa",
            "firstName": "Prof. Ryleigh Johnston",
            "middleName": "Miss Kenya Gaylord MD",
            "lastName": "Vicenta Lockman",
            "email": "wilson21@example.com",
            "roles": []
        },
        {
            "id": "70ee2a78-8288-4a12-adfc-5a5ac9b2560c",
            "firstName": "Urban Nienow DDS",
            "middleName": "Angus Davis I",
            "lastName": "Imogene Koss",
            "email": "vicente40@example.com",
            "roles": []
        },
        {
            "id": "715478dd-977b-4a64-850d-9117237029c6",
            "firstName": "Lenore Bartell",
            "middleName": "Adela Cronin",
            "lastName": "Candelario Conn DDS",
            "email": "kavon.jones@example.com",
            "roles": []
        },
        {
            "id": "75c87283-eb95-43b9-8507-b0009671fb65",
            "firstName": "Dwight Torp",
            "middleName": "Arno Morissette",
            "lastName": "Dr. Tina Stokes",
            "email": "roob.demarcus@example.net",
            "roles": []
        },
        {
            "id": "7770807c-6a8b-41da-8aaf-8b3aa33c481f",
            "firstName": "Marcos Kautzer",
            "middleName": "Else Bode DDS",
            "lastName": "Ashtyn Collins",
            "email": "marlin05@example.net",
            "roles": []
        },
        {
            "id": "77f89ec3-8934-4786-99a8-250622f68577",
            "firstName": "Gayle Kozey",
            "middleName": "Annalise Aufderhar",
            "lastName": "Leola Miller",
            "email": "presley.lakin@example.org",
            "roles": []
        },
        {
            "id": "799d9440-8b80-47c8-b7c1-7c85992c70ca",
            "firstName": "Holly Keeling",
            "middleName": "Jarrell Bradtke",
            "lastName": "Saige Grant",
            "email": "prussel@example.net",
            "roles": []
        },
        {
            "id": "7bff6a81-1244-4c32-aba8-8d6b88925160",
            "firstName": "Elisha Crist",
            "middleName": "Adrian Effertz",
            "lastName": "Mireille Pfannerstill",
            "email": "alberta.zulauf@example.com",
            "roles": []
        },
        {
            "id": "7f91ff81-d9ee-4c94-aa9e-111c1b124f5a",
            "firstName": "Helga Bradtke",
            "middleName": "Mrs. Trisha Hudson Jr.",
            "lastName": "Lydia Hirthe",
            "email": "ronny.ortiz@example.net",
            "roles": []
        },
        {
            "id": "7fbd1243-9d67-44aa-a018-19c12d25cf97",
            "firstName": "Kathleen Torp",
            "middleName": "Marlon Bednar",
            "lastName": "Halie Goyette",
            "email": "clarissa.jacobs@example.com",
            "roles": []
        },
        {
            "id": "80c5df46-8bd9-4f12-b772-bc89bea50387",
            "firstName": "Prof. Angie Gutmann MD",
            "middleName": "Wilton Murray",
            "lastName": "Annamae Brekke",
            "email": "graynor@example.net",
            "roles": []
        },
        {
            "id": "83686104-8423-478e-8cbb-2982af4e24da",
            "firstName": "Vern Marvin III",
            "middleName": "Adrienne Klein",
            "lastName": "Corrine Cremin",
            "email": "crona.jamey@example.net",
            "roles": []
        },
        {
            "id": "839160af-a15c-404b-9a50-583159b57415",
            "firstName": "Miss Hettie Dickens",
            "middleName": "Danny Kassulke DDS",
            "lastName": "Prof. Marietta DuBuque IV",
            "email": "rnolan@example.net",
            "roles": []
        },
        {
            "id": "83ab490c-f53d-4b4c-9be2-6d1d75d64dce",
            "firstName": "Prof. Laverna Powlowski",
            "middleName": "Mr. Kory Prosacco I",
            "lastName": "Elisabeth Friesen",
            "email": "cary94@example.com",
            "roles": []
        },
        {
            "id": "8ce46f9e-391f-4ca4-b47f-68187ffbc1c7",
            "firstName": "Vern Johnston",
            "middleName": "Hipolito Kuhlman",
            "lastName": "Cody Anderson",
            "email": "ukessler@example.net",
            "roles": []
        },
        {
            "id": "8e2df701-eb64-4f5e-a232-5beaaf21c9a0",
            "firstName": "Asha Herzog",
            "middleName": "Scot Langworth",
            "lastName": "Leora Hegmann",
            "email": "cleannon@example.net",
            "roles": []
        },
        {
            "id": "8e997bbb-f9d0-4806-bf4f-bcb693fbb2c4",
            "firstName": "Ms. Shannon Schumm",
            "middleName": "Noble Franecki",
            "lastName": "Keira Williamson",
            "email": "jodie56@example.org",
            "roles": []
        },
        {
            "id": "8fdce2ac-4abd-4e74-83f3-69f1e1664013",
            "firstName": "Samantha Zulauf",
            "middleName": "Dr. Colt Metz III",
            "lastName": "Liam Miller MD",
            "email": "welch.maggie@example.com",
            "roles": []
        },
        {
            "id": "96b30864-2bd5-47d2-96a8-0d2d7a1468b8",
            "firstName": "Tatyana Von",
            "middleName": "Queenie Goldner",
            "lastName": "Isaac Donnelly",
            "email": "maiya40@example.org",
            "roles": []
        },
        {
            "id": "987ede6a-af75-4100-b465-17cf11cdb440",
            "firstName": "Dr. Amya Grady DVM",
            "middleName": "Earline Medhurst",
            "lastName": "Prof. Arjun Frami Jr.",
            "email": "ward.millie@example.org",
            "roles": []
        },
        {
            "id": "9aa133e3-af76-4dc3-934d-93669a35bfd8",
            "firstName": "Kenton Fadel",
            "middleName": "Diego Crona",
            "lastName": "Emery Daugherty",
            "email": "tmorar@example.org",
            "roles": []
        },
        {
            "id": "9d2e27f4-68c9-41c4-8437-b76d163bc171",
            "firstName": "Esperanza Mann",
            "middleName": "Lavon Bednar IV",
            "lastName": "Dr. Jamel Schaden Sr.",
            "email": "kaylah81@example.com",
            "roles": []
        },
        {
            "id": "a0c45d84-b9b1-4f51-918f-55b6cbca53cd",
            "firstName": "Santiago Feeney",
            "middleName": "Karlie Yundt",
            "lastName": "Dr. Adah Hoeger V",
            "email": "otha.ziemann@example.org",
            "roles": []
        },
        {
            "id": "a3a28de3-ed99-41e9-bd7f-476c449a655e",
            "firstName": "Halle Feil",
            "middleName": "Jamarcus Roob",
            "lastName": "Larissa Reichel",
            "email": "ikeeling@example.com",
            "roles": []
        },
        {
            "id": "ae3361a7-9c03-4295-90a5-d26cb37491f4",
            "firstName": "Joana Rath Sr.",
            "middleName": "Lia Jast I",
            "lastName": "Randal O'Connell",
            "email": "prohaska.kenyatta@example.net",
            "roles": []
        },
        {
            "id": "ae8a863f-4250-4f7a-a12c-5c32afb9b8bb",
            "firstName": "Viva Jenkins",
            "middleName": "Ardella Lockman",
            "lastName": "Consuelo Kassulke",
            "email": "laurie.smith@example.net",
            "roles": []
        },
        {
            "id": "af925fe2-dfa4-40af-8e68-e9371a60546f",
            "firstName": "Theo Wilderman",
            "middleName": "Dr. Beulah Jaskolski",
            "lastName": "Zack Bailey",
            "email": "nya.schneider@example.net",
            "roles": []
        },
        {
            "id": "af9af14f-706a-4b1d-a0b8-a14c8489916a",
            "firstName": "Prof. Fredy Braun",
            "middleName": "Jasen Olson",
            "lastName": "Dr. Elwin Bayer",
            "email": "wisozk.camden@example.net",
            "roles": []
        },
        {
            "id": "b06ece9e-9d0f-4ead-bc69-28ea3e26b82b",
            "firstName": "Ardith Hilpert",
            "middleName": "Dr. Doyle Boehm",
            "lastName": "Jeremie Douglas PhD",
            "email": "jesus.kovacek@example.com",
            "roles": []
        },
        {
            "id": "b0bd72c4-0113-4db9-8e28-900e265da7ea",
            "firstName": "Barton Dicki",
            "middleName": "Dr. Guy Ritchie",
            "lastName": "Mrs. Isobel Schmitt Sr.",
            "email": "morris59@example.net",
            "roles": []
        },
        {
            "id": "b34eff90-744e-404e-a20e-e31f039bad6a",
            "firstName": "Prof. Irving Turner III",
            "middleName": "Dr. Sigmund Wyman II",
            "lastName": "Mrs. Natasha Effertz MD",
            "email": "ledner.ramiro@example.net",
            "roles": []
        },
        {
            "id": "b5aac4e1-bf05-4050-aefa-2e5e9a8c4c24",
            "firstName": "Marion Haag",
            "middleName": "Brenden Abernathy",
            "lastName": "Freeda Robel",
            "email": "oprohaska@example.net",
            "roles": []
        },
        {
            "id": "b6805baa-f01a-4497-9eb2-491e9e907c52",
            "firstName": "Sunny Sipes PhD",
            "middleName": "Abelardo Shields",
            "lastName": "Giovanni Schaefer",
            "email": "scot.pollich@example.org",
            "roles": []
        },
        {
            "id": "bb8019bb-d4aa-42b2-b3c2-6a02ae332bf5",
            "firstName": "Dr. Eugenia Pfannerstill",
            "middleName": "Dr. Garth Reinger",
            "lastName": "Hillard Schinner",
            "email": "strosin.kelley@example.net",
            "roles": []
        },
        {
            "id": "bb9e4842-5d81-4502-af5b-8275ba489c1b",
            "firstName": "Stacy Kihn",
            "middleName": "Katarina Bartell",
            "lastName": "Carlo Smitham Sr.",
            "email": "aauer@example.org",
            "roles": []
        },
        {
            "id": "c1086ef4-823b-4357-9c5c-e938887b6ef0",
            "firstName": "Miss Dakota Stracke III",
            "middleName": "Dr. Bernadine Boyer III",
            "lastName": "Keyon O'Kon",
            "email": "irice@example.org",
            "roles": []
        },
        {
            "id": "c165b105-31dd-4165-ab95-5cd711065d4c",
            "firstName": "Prof. Jovanny Grimes",
            "middleName": "Ryann Crooks",
            "lastName": "Prof. Frida Moore",
            "email": "eledner@example.org",
            "roles": []
        },
        {
            "id": "c1cf3391-263d-4276-a1fa-5027df5cd352",
            "firstName": "Eliane Gusikowski",
            "middleName": "Reba Gulgowski",
            "lastName": "Brown McDermott",
            "email": "gdeckow@example.org",
            "roles": []
        },
        {
            "id": "c2093ab2-16ec-42a0-94b7-c1ad9ab77a9c",
            "firstName": "Dessie Bergstrom V",
            "middleName": "Cesar Moore",
            "lastName": "Trey Schroeder",
            "email": "vhegmann@example.org",
            "roles": []
        },
        {
            "id": "c384e6f6-02b1-45c5-ab39-230932931989",
            "firstName": "Conner Littel IV",
            "middleName": "Anya Schumm",
            "lastName": "Green Osinski",
            "email": "mckenzie.adolf@example.org",
            "roles": []
        },
        {
            "id": "cca6a19b-89a7-46a1-89d4-b384c592caa0",
            "firstName": "Aric Nader",
            "middleName": "Prof. Lurline Metz Jr.",
            "lastName": "Franco Bayer",
            "email": "augustine.gusikowski@example.com",
            "roles": []
        },
        {
            "id": "cd306fb2-da61-4651-9708-69426386a416",
            "firstName": "Arianna Farrell",
            "middleName": "Mattie Hegmann",
            "lastName": "Johan Friesen",
            "email": "considine.scarlett@example.com",
            "roles": []
        },
        {
            "id": "cdeacb1a-9971-4cea-957b-46b5ce59cba9",
            "firstName": "Finn Feil",
            "middleName": "Mr. Lamont Kertzmann III",
            "lastName": "Antonetta McCullough",
            "email": "danny.grant@example.com",
            "roles": []
        },
        {
            "id": "cfc3da5a-49e7-44bc-891e-4cb47baac0cf",
            "firstName": "Prof. Stephen Bode V",
            "middleName": "Mozell Bogisich V",
            "lastName": "Celine Gaylord II",
            "email": "ariel90@example.net",
            "roles": []
        },
        {
            "id": "d217160a-bd14-48e4-978a-30b6c6332e91",
            "firstName": "Dr. Norwood Mante II",
            "middleName": "Dandre Cronin",
            "lastName": "Maddison Miller",
            "email": "jolie.funk@example.net",
            "roles": []
        },
        {
            "id": "d3dd9122-e44b-4b73-807d-e2b251f891ce",
            "firstName": "Mrs. Deanna Murray",
            "middleName": "Annabelle Bernier",
            "lastName": "Cicero Miller II",
            "email": "devan.satterfield@example.net",
            "roles": []
        },
        {
            "id": "d7e8ec12-4c7f-4542-b65b-bd40313648c8",
            "firstName": "Dr. Blaise Stanton Sr.",
            "middleName": "Jailyn Robel PhD",
            "lastName": "Dr. Kasandra Torp",
            "email": "hlubowitz@example.org",
            "roles": []
        },
        {
            "id": "d911c439-d592-4d9e-8736-806f91608edc",
            "firstName": "Mafalda Gerlach",
            "middleName": "Dr. Orville Rice",
            "lastName": "Shanon Ortiz IV",
            "email": "towne.travon@example.com",
            "roles": []
        },
        {
            "id": "dd75d3c1-fe2f-433b-b25c-711d0f6ae9c9",
            "firstName": "Miss Enola Hilpert",
            "middleName": "Joanie Boyer",
            "lastName": "Hilbert Daugherty",
            "email": "dschaden@example.com",
            "roles": []
        },
        {
            "id": "e2d2264f-a10d-492a-bec5-df22225a9777",
            "firstName": "Mr. Wallace Rodriguez",
            "middleName": "Fabian Sawayn",
            "lastName": "Angelica Lockman",
            "email": "zboncak.rylee@example.org",
            "roles": []
        },
        {
            "id": "e535adfa-985c-4568-8b75-daa6b39bc177",
            "firstName": "Dr. Christophe Huels III",
            "middleName": "Miss Retta O'Conner",
            "lastName": "Camden Gerlach",
            "email": "kellen.kub@example.com",
            "roles": []
        },
        {
            "id": "e88899c4-7a1b-4559-99d5-a2662718240e",
            "firstName": "Skylar Hessel",
            "middleName": "Grayson Ebert Jr.",
            "lastName": "Corene Fadel DVM",
            "email": "angela.yost@example.com",
            "roles": []
        },
        {
            "id": "e9010a84-e36d-4dd3-8ee5-f535390ac9db",
            "firstName": "Brice Nader",
            "middleName": "Keagan McLaughlin",
            "lastName": "Maryse Predovic",
            "email": "juwan13@example.com",
            "roles": []
        },
        {
            "id": "ebba67dd-51b4-40d3-96dc-7a448a4d0b45",
            "firstName": "Douglas Fadel",
            "middleName": "Rhianna Schinner",
            "lastName": "Mrs. Katelyn Wilderman III",
            "email": "sarah67@example.com",
            "roles": []
        },
        {
            "id": "f4d1ec18-0fac-4dfa-b642-12db65717f36",
            "firstName": "Kenton Becker",
            "middleName": "Mariano Schmidt",
            "lastName": "Ralph Bins",
            "email": "xlowe@example.net",
            "roles": []
        },
        {
            "id": "f7715bca-e66a-4a62-b001-45f0c1a58127",
            "firstName": "Sonia Mayer",
            "middleName": "Damion Yost",
            "lastName": "Sean Langosh",
            "email": "lamar16@example.net",
            "roles": []
        }
    ]
}
```

### HTTP Request
`GET api/users`


<!-- END_fc1e4f6a697e3c48257de845299b71d5 -->

<!-- START_5dac10bb34c7618b018b0230d4a51648 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET api/users/create`


<!-- END_5dac10bb34c7618b018b0230d4a51648 -->

<!-- START_12e37982cc5398c7100e59625ebb5514 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/users`


<!-- END_12e37982cc5398c7100e59625ebb5514 -->

<!-- START_8653614346cb0e3d444d164579a0a0a2 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET api/users/{user}`


<!-- END_8653614346cb0e3d444d164579a0a0a2 -->

<!-- START_11ae28146a4d70ba9a0af9b65d290ad5 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET api/users/{user}/edit`


<!-- END_11ae28146a4d70ba9a0af9b65d290ad5 -->

<!-- START_48a3115be98493a3c866eb0e23347262 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/users/{user}`

`PATCH api/users/{user}`


<!-- END_48a3115be98493a3c866eb0e23347262 -->

<!-- START_d2db7a9fe3abd141d5adbc367a88e969 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/users/{user}`


<!-- END_d2db7a9fe3abd141d5adbc367a88e969 -->

<!-- START_6470e6b987921f5c45bf7a2d8e674f57 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": "273cc84d-b6fa-4142-a0bc-47f8c5a18523",
            "name": "doctor",
            "guardName": "api",
            "permissions": []
        },
        {
            "id": "2cd057ac-9ef7-4329-b9d0-20b479c58ab6",
            "name": "sample",
            "guardName": "api",
            "permissions": []
        },
        {
            "id": "305cf664-87af-4782-8b0a-9ff66217f17e",
            "name": "doctor",
            "guardName": "api",
            "permissions": []
        },
        {
            "id": "43281085-2df5-40ce-948f-fdb6d988f728",
            "name": "group",
            "guardName": "api",
            "permissions": []
        },
        {
            "id": "51df1aed-84c8-4f12-bbb8-3215fb9ced4e",
            "name": "admin",
            "guardName": "api",
            "permissions": []
        },
        {
            "id": "633ac59d-3681-4c39-af9a-6ea4ca6554e9",
            "name": "patient",
            "guardName": "api",
            "permissions": []
        }
    ]
}
```

### HTTP Request
`GET api/roles`


<!-- END_6470e6b987921f5c45bf7a2d8e674f57 -->

<!-- START_805a99be760d5093d96670b9dfe2da91 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/roles/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/roles/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET api/roles/create`


<!-- END_805a99be760d5093d96670b9dfe2da91 -->

<!-- START_90c780acaefab9740431579512d07101 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/roles`


<!-- END_90c780acaefab9740431579512d07101 -->

<!-- START_eb37fe1fa9305b4b78850dd87031670b -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/roles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/roles/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET api/roles/{role}`


<!-- END_eb37fe1fa9305b4b78850dd87031670b -->

<!-- START_92c0d5394c54c61004fbad7be1e1edb6 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/roles/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/roles/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET api/roles/{role}/edit`


<!-- END_92c0d5394c54c61004fbad7be1e1edb6 -->

<!-- START_cccebfff0074c9c5f499e215eee84e86 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/roles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/roles/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/roles/{role}`

`PATCH api/roles/{role}`


<!-- END_cccebfff0074c9c5f499e215eee84e86 -->

<!-- START_9aab750214722ffceebef64f24a2e175 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/roles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/roles/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/roles/{role}`


<!-- END_9aab750214722ffceebef64f24a2e175 -->

<!-- START_42db014707f615cd5cafb5ad1b6d0675 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/permissions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/permissions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": []
}
```

### HTTP Request
`GET api/permissions`


<!-- END_42db014707f615cd5cafb5ad1b6d0675 -->

<!-- START_2ad96b02ff6912eafe4046983598c86a -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/permissions/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/permissions/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET api/permissions/create`


<!-- END_2ad96b02ff6912eafe4046983598c86a -->

<!-- START_d513e82f79d47649a14d2e59fda93073 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/permissions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/permissions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/permissions`


<!-- END_d513e82f79d47649a14d2e59fda93073 -->

<!-- START_29ec1a9c6f20445dcd75bf6a4cc63e2a -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/permissions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/permissions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET api/permissions/{permission}`


<!-- END_29ec1a9c6f20445dcd75bf6a4cc63e2a -->

<!-- START_aa45e8d546bfc2af812983b6ebde452e -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/permissions/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/permissions/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET api/permissions/{permission}/edit`


<!-- END_aa45e8d546bfc2af812983b6ebde452e -->

<!-- START_cbdd1fce06181b5d5d8d0f3ae85ed0ee -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/permissions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/permissions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/permissions/{permission}`

`PATCH api/permissions/{permission}`


<!-- END_cbdd1fce06181b5d5d8d0f3ae85ed0ee -->

<!-- START_58309983000c47ce901812498144165a -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/permissions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/permissions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/permissions/{permission}`


<!-- END_58309983000c47ce901812498144165a -->

<!-- START_cdf5e02e9b913556f9304546d59e6c56 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/patients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/patients"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": "005fa6f7-2354-4ff0-81f1-1615f64659f5",
            "medicalRecordNumber": "KIf4c4VRUa",
            "fullName": "Mrs. Iliana HagenesMr. Alden EffertzJenifer Lakin",
            "firstName": "Mrs. Iliana Hagenes",
            "middleName": "Mr. Alden Effertz",
            "lastName": "Jenifer Lakin",
            "gender": "Female",
            "dateOfBirth": "2008-09-03",
            "language": "Amharic",
            "religion": "Muslim",
            "address": null,
            "emergencyContact": null
        },
        {
            "id": "02640666-14fe-4025-8010-c3148b5e7ca1",
            "medicalRecordNumber": "wIJoncNtou",
            "fullName": "Miss Lonie Fritsch IValentine HalvorsonAlbina Schamberger",
            "firstName": "Miss Lonie Fritsch I",
            "middleName": "Valentine Halvorson",
            "lastName": "Albina Schamberger",
            "gender": "Female",
            "dateOfBirth": "1985-03-24",
            "language": "Tigregna",
            "religion": "Muslim",
            "address": null,
            "emergencyContact": null
        },
        {
            "id": "030a871c-1765-42ee-ab0e-4b5e34137bcf",
            "medicalRecordNumber": "EgJXSTNzFY",
            "fullName": "Mr. Abe Hegmann PhDIsaias QuitzonMarco Lebsack",
            "firstName": "Mr. Abe Hegmann PhD",
            "middleName": "Isaias Quitzon",
            "lastName": "Marco Lebsack",
            "gender": "Female",
            "dateOfBirth": "1998-01-15",
            "language": "English",
            "religion": "Protestant",
            "address": null,
            "emergencyContact": {
                "firstName": "Mr. Roosevelt McGlynn",
                "middleName": "Santino Dach",
                "lastName": "Savanna Treutel",
                "emergencyContactAddress": null
            }
        },
        {
            "id": "0372a164-c539-4736-acdd-0f2ab9da2f7e",
            "medicalRecordNumber": "7Vg77V6ZLC",
            "fullName": "Tyra SwiftMagali JacobsonNathanael Upton",
            "firstName": "Tyra Swift",
            "middleName": "Magali Jacobson",
            "lastName": "Nathanael Upton",
            "gender": "Male",
            "dateOfBirth": "2015-01-06",
            "language": "Tigregna",
            "religion": "Protestant",
            "address": null,
            "emergencyContact": {
                "firstName": "Betty Fritsch",
                "middleName": "Mr. Francesco Bergstrom I",
                "lastName": "Suzanne Stracke",
                "emergencyContactAddress": null
            }
        },
        {
            "id": "0512b7c1-ca87-4910-905c-48355eb079b3",
            "medicalRecordNumber": "et1wwyxoQB",
            "fullName": "Odessa Halvorson Jr.Hillary EmardElecta Schoen",
            "firstName": "Odessa Halvorson Jr.",
            "middleName": "Hillary Emard",
            "lastName": "Electa Schoen",
            "gender": "Male",
            "dateOfBirth": "1994-03-17",
            "language": "Oromifa",
            "religion": "Muslim",
            "address": null,
            "emergencyContact": null
        },
        {
            "id": "057dff33-c938-4787-8205-de7fc741a86c",
            "medicalRecordNumber": "j2ul0jjNRT",
            "fullName": "Karolann MillerMiss Oma McClure IIThaddeus Jaskolski",
            "firstName": "Karolann Miller",
            "middleName": "Miss Oma McClure II",
            "lastName": "Thaddeus Jaskolski",
            "gender": "Female",
            "dateOfBirth": "2017-05-08",
            "language": "Oromifa",
            "religion": "Catholic",
            "address": null,
            "emergencyContact": null
        },
        {
            "id": "05ab6e6f-d379-4ca7-b518-630015b85da7",
            "medicalRecordNumber": "0opGYrJmbK",
            "fullName": "Dr. Modesto JaskolskiAli ErdmanAndreane Leffler",
            "firstName": "Dr. Modesto Jaskolski",
            "middleName": "Ali Erdman",
            "lastName": "Andreane Leffler",
            "gender": "Female",
            "dateOfBirth": "1979-05-24",
            "language": "Oromifa",
            "religion": "Protestant",
            "address": null,
            "emergencyContact": {
                "firstName": "Theresia Beier",
                "middleName": "Kristy Ullrich",
                "lastName": "Onie Considine",
                "emergencyContactAddress": null
            }
        },
        {
            "id": "064da1e3-63e3-42b9-b597-fb47809a980f",
            "medicalRecordNumber": "HvxVWfSOGl",
            "fullName": "Evert ReynoldsAmelie GrahamJarret Crist",
            "firstName": "Evert Reynolds",
            "middleName": "Amelie Graham",
            "lastName": "Jarret Crist",
            "gender": "Female",
            "dateOfBirth": "1971-03-18",
            "language": "Oromifa",
            "religion": "Protestant",
            "address": null,
            "emergencyContact": null
        },
        {
            "id": "0783542a-89ff-45e5-a0fa-f272c1e45000",
            "medicalRecordNumber": "1e56q70bOk",
            "fullName": "Prof. Nils Glover IIIClaire O'ConnerKory Glover",
            "firstName": "Prof. Nils Glover III",
            "middleName": "Claire O'Conner",
            "lastName": "Kory Glover",
            "gender": "Female",
            "dateOfBirth": "1996-10-11",
            "language": "Oromifa",
            "religion": "Catholic",
            "address": null,
            "emergencyContact": {
                "firstName": "Prof. Eva Deckow I",
                "middleName": "Faustino Barrows",
                "lastName": "Dr. Araceli Collier V",
                "emergencyContactAddress": null
            }
        },
        {
            "id": "079404cd-3574-499b-9d72-d00a915c721c",
            "medicalRecordNumber": "TQyh0By4iL",
            "fullName": "Loy KuhnMrs. Myah ReillyProf. Ethyl Streich V",
            "firstName": "Loy Kuhn",
            "middleName": "Mrs. Myah Reilly",
            "lastName": "Prof. Ethyl Streich V",
            "gender": "Female",
            "dateOfBirth": "2016-03-07",
            "language": "English",
            "religion": "Orthodox",
            "address": null,
            "emergencyContact": {
                "firstName": "Johathan Kerluke",
                "middleName": "Christelle Waters",
                "lastName": "Amari Armstrong",
                "emergencyContactAddress": null
            }
        },
        {
            "id": "07e8704a-e445-4399-91fb-8b697c2a3d61",
            "medicalRecordNumber": "2P8XZ8mP8r",
            "fullName": "Jammie BernhardProf. Zechariah Franecki VNeoma Hessel",
            "firstName": "Jammie Bernhard",
            "middleName": "Prof. Zechariah Franecki V",
            "lastName": "Neoma Hessel",
            "gender": "Female",
            "dateOfBirth": "1979-12-18",
            "language": "Oromifa",
            "religion": "Orthodox",
            "address": null,
            "emergencyContact": null
        },
        {
            "id": "07f0df71-3090-40d0-a1cc-7e17aeb50041",
            "medicalRecordNumber": "JApI1vCJ8J",
            "fullName": "Ms. Fabiola Torp PhDProf. Belle King VJodie Goyette",
            "firstName": "Ms. Fabiola Torp PhD",
            "middleName": "Prof. Belle King V",
            "lastName": "Jodie Goyette",
            "gender": "Female",
            "dateOfBirth": "1977-07-31",
            "language": "English",
            "religion": "Orthodox",
            "address": null,
            "emergencyContact": null
        },
        {
            "id": "083afbec-a917-4ddb-851e-800c7d351295",
            "medicalRecordNumber": "uBfzmaB6lW",
            "fullName": "Frank McLaughlinTatum GleichnerKatharina Little",
            "firstName": "Frank McLaughlin",
            "middleName": "Tatum Gleichner",
            "lastName": "Katharina Little",
            "gender": "Female",
            "dateOfBirth": "2016-02-21",
            "language": "English",
            "religion": "Orthodox",
            "address": null,
            "emergencyContact": null
        },
        {
            "id": "092d922e-3d9d-4e06-854e-91422fdb02f5",
            "medicalRecordNumber": "dYqQ1y5t3d",
            "fullName": "Eleanora ChamplinKoby KovacekMiss Anabel Osinski",
            "firstName": "Eleanora Champlin",
            "middleName": "Koby Kovacek",
            "lastName": "Miss Anabel Osinski",
            "gender": "Female",
            "dateOfBirth": "2002-04-15",
            "language": "Amharic",
            "religion": "Protestant",
            "address": null,
            "emergencyContact": {
                "firstName": "Dr. Virgie Berge IV",
                "middleName": "Adele Kuhic",
                "lastName": "Catherine Rodriguez",
                "emergencyContactAddress": null
            }
        },
        {
            "id": "0952fea3-386f-4298-9955-761fcdb8fe23",
            "medicalRecordNumber": "NQNZCyu4az",
            "fullName": "Dr. Veronica Hayes MDEvan WhiteLavinia Wolf",
            "firstName": "Dr. Veronica Hayes MD",
            "middleName": "Evan White",
            "lastName": "Lavinia Wolf",
            "gender": "Female",
            "dateOfBirth": "2020-02-24",
            "language": "Oromifa",
            "religion": "Muslim",
            "address": null,
            "emergencyContact": null
        }
    ],
    "links": {
        "first": "http:\/\/localhost\/api\/patients?page=1",
        "last": "http:\/\/localhost\/api\/patients?page=27",
        "prev": null,
        "next": "http:\/\/localhost\/api\/patients?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 27,
        "path": "http:\/\/localhost\/api\/patients",
        "per_page": 15,
        "to": 15,
        "total": 397
    }
}
```

### HTTP Request
`GET api/patients`


<!-- END_cdf5e02e9b913556f9304546d59e6c56 -->

<!-- START_d1d8340624b42ea8e015ce0a4d36342d -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/patients/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/patients/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/patients/create`


<!-- END_d1d8340624b42ea8e015ce0a4d36342d -->

<!-- START_9595666a103e105bb3f677f002653307 -->
## api/patients
> Example request:

```bash
curl -X POST \
    "http://localhost/api/patients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/patients"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/patients`


<!-- END_9595666a103e105bb3f677f002653307 -->

<!-- START_e21961238df73c8544f00766ed069000 -->
## Show the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/patients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/patients/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Patient] 1"
}
```

### HTTP Request
`GET api/patients/{patient}`


<!-- END_e21961238df73c8544f00766ed069000 -->

<!-- START_f79420b3006c6726b672d145d298b8a5 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/patients/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/patients/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET api/patients/{patient}/edit`


<!-- END_f79420b3006c6726b672d145d298b8a5 -->

<!-- START_7b1b54123a6d30586c3e445437e73fd5 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/patients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/patients/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/patients/{patient}`

`PATCH api/patients/{patient}`


<!-- END_7b1b54123a6d30586c3e445437e73fd5 -->

<!-- START_91030317441de3d43a948f7948db4fe7 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/patients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/patients/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/patients/{patient}`


<!-- END_91030317441de3d43a948f7948db4fe7 -->

<!-- START_f00c80429dc858b547d12bbec207a226 -->
## api/patients/addPatientToDepartment
> Example request:

```bash
curl -X POST \
    "http://localhost/api/patients/addPatientToDepartment" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/patients/addPatientToDepartment"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/patients/addPatientToDepartment`


<!-- END_f00c80429dc858b547d12bbec207a226 -->

<!-- START_143b5a9a7dc1aafde96fb717c8203dd6 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/vitals" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/vitals"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET api/vitals`


<!-- END_143b5a9a7dc1aafde96fb717c8203dd6 -->

<!-- START_94ddb7cd15701f472dcd1411d9dfa55a -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/vitals/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/vitals/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET api/vitals/create`


<!-- END_94ddb7cd15701f472dcd1411d9dfa55a -->

<!-- START_60978d31a1cc8acc06b89ae6c27faf29 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/vitals" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/vitals"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/vitals`


<!-- END_60978d31a1cc8acc06b89ae6c27faf29 -->

<!-- START_0959f0bbc588c15de79577a448bd5d8d -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/vitals/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/vitals/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/vitals/{vital}`


<!-- END_0959f0bbc588c15de79577a448bd5d8d -->

<!-- START_858d166df6bdaf9559c30f9036bdc02a -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/vitals/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/vitals/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET api/vitals/{vital}/edit`


<!-- END_858d166df6bdaf9559c30f9036bdc02a -->

<!-- START_79fa641650977d2eb9fc43320cb9107e -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/vitals/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/vitals/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/vitals/{vital}`

`PATCH api/vitals/{vital}`


<!-- END_79fa641650977d2eb9fc43320cb9107e -->

<!-- START_ce4afb8dcd4082e97180d71426f97116 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/vitals/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/vitals/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/vitals/{vital}`


<!-- END_ce4afb8dcd4082e97180d71426f97116 -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST \
    "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## Log the user out of the application.

> Example request:

```bash
curl -X POST \
    "http://localhost/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET register`


<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST \
    "http://localhost/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->

<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset`


<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST \
    "http://localhost/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/password/reset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/reset/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset/{token}`


<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://localhost/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->

<!-- START_b77aedc454e9471a35dcb175278ec997 -->
## Display the password confirmation view.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET password/confirm`


<!-- END_b77aedc454e9471a35dcb175278ec997 -->

<!-- START_54462d3613f2262e741142161c0e6fea -->
## Confirm the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://localhost/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/confirm`


<!-- END_54462d3613f2262e741142161c0e6fea -->

<!-- START_cb859c8e84c35d7133b6a6c8eac253f8 -->
## Show the application dashboard.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/home" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET home`


<!-- END_cb859c8e84c35d7133b6a6c8eac253f8 -->

<!-- START_2ee6cf5b7adfa81a451ace297f1ded55 -->
## admin/{any?}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/{any?}`

`POST admin/{any?}`

`PUT admin/{any?}`

`PATCH admin/{any?}`

`DELETE admin/{any?}`

`OPTIONS admin/{any?}`


<!-- END_2ee6cf5b7adfa81a451ace297f1ded55 -->


