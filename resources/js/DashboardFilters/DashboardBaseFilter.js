class DashboardBaseFilter {

    constructor(date) {
        this.date = date || new Date();
        this.data = [];
        this.fethcUrl = '/';
    }

    async fetch(date, url){
        const formattedDate =  await this.formatDate(date);
        const fetchUrl = url + formattedDate;
        const response = await fetch(fetchUrl, {
            method: 'GET',
        });
        return await response.json();
    }

    async next(){
        //place holder for child classes
    }

    async previous(){
        //place holder for child classes
    }

    async setDate(date){
        this.date = new Date(date);
        return this.fetch(this.date, this.fethcUrl);
    }

    async formatDate(date) {
        let d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        return [year, month, day].join('-');
    }
}

export default DashboardBaseFilter;
