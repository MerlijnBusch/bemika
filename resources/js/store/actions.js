let actions = {
    fetchPatients({commit}) {
        axios.get('/patient')
            .then(res => {
                commit('FETCH_PATIENTS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
};

export default actions
