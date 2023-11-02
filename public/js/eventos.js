function confirmDelete(eventoId) {
    const form = document.querySelector(`form[data-evento-form="${eventoId}"]`);
    if (form) {
        if (confirm("Tem certeza que deseja excluir este tipo de evento?")) {
            form.submit();
        }
    } else {
        console.error("Formulário não encontrado.");
    }
}
