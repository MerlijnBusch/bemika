import DashboardBaseFilter from "./DashboardBaseFilter";

class MonthFilter extends DashboardBaseFilter {

    constructor() {
        super(new Date());
        this.fethcUrl = window.location.origin + "/dashboard/month/";
    }

    //@todo make sure this takes in leap years currently it doesnt
    async next() {
        this.date = new Date(this.date).setMonth(new Date(this.date).getMonth() + 1);
        return await this.fetch(this.date, this.fethcUrl);
    }

    async previous() {
        this.date = new Date(this.date).setMonth(new Date(this.date).getMonth() + 1);
        return await this.fetch(this.date, this.fethcUrl);
    }
}

export default MonthFilter;
