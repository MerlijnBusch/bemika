class WeekFilter {

    static async fetch(date, url){
        const formattedDate =  await this.formatDate(date);
        const fetchUrl = url + formattedDate;
        let response = null;
        await fetch(fetchUrl)
            .then(function(r) {
                return r.json();
            }).then(function(data) {
                response = data;
            });
        return response;
    }

    static async next() {
        this.date = new Date(this.date).setDate(new Date(this.date).getDate() + 7);
        return await this.fetch(this.date, window.location.origin + "/dashboard/week/");
    }

    static async previous() {
        this.date = new Date(this.date).setDate(new Date(this.date).getDate() - 7);
        return await this.fetch(this.date, window.location.origin + "/dashboard/week/");
    }

    static async setDate(date){
        this.date = new Date(date);
        return this.fetch(this.date, window.location.origin + "/dashboard/week/");
    }

    static async formatDate(date) {
        let d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        return [year, month, day].join('-');
    }
}

export default WeekFilter;
