<script>
    function getHumanByIdInShowModal(human) {
        document.getElementById('name').textContent=human.name + " " + human.surname + " " + human.lastname
        document.getElementById('image').src="../../../"+human.image
        document.getElementById('image').alt=human.name + " " + human.surname + " " + human.lastname
        document.getElementById('data_birth').textContent=human.date_birth
        document.getElementById('location_birth').textContent=human.location_birth
    }
</script>
