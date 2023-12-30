<script>
    document.addEventListener("DOMContentLoaded", function() {
        const alertPlaceholder = document.getElementById('liveAlertPlaceholder');

        const appendAlert = (message, type) => {
            const wrapper = document.createElement('div');
            wrapper.innerHTML = `
                <div class="alert alert-${type} alert-dismissible" role="alert">
                    <div>${message}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `;
            alertPlaceholder.innerHTML = ''; // Очищаем содержимое placeholder'а перед добавлением нового сообщения
            alertPlaceholder.append(wrapper);
        };

        const alertTrigger = document.getElementById('copyButton');
        if (alertTrigger) {
            alertTrigger.addEventListener('click', () => {
                const copyText = document.getElementById('copyText');
                copyText.select();

                try {
                    const successful = document.execCommand('copy');
                    const message = successful ? 'Успешно скопировано' : 'Не удалось скопировать';
                    appendAlert(message, successful ? 'success' : 'danger');
                    copyTextFunc();
                } catch (err) {
                    appendAlert('Ошибка при копировании', 'danger');
                }
            });
        }

        function copyTextFunc() {
            const input = document.getElementById('copyText');
            input.select();

            navigator.clipboard.writeText(input.value)
                .then(() => {
                })
                .catch(err => {
                    console.error('Ошибка копирования: ', err);
                });
        }
    });

    function getHumanByIdInShowModal(human) {
        document.getElementById('name').textContent=human.name + " " + human.o_name + " " + human.f_name
        document.getElementById('image').src="../"+human.image
        document.getElementById('data_birth').textContent=human.data_birth
        document.getElementById('location_birth').textContent=human.location_birth
    }
</script>