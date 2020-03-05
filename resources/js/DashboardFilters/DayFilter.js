import DashboardBaseFilter from "./DashboardBaseFilter";

class DayFilter extends DashboardBaseFilter {

    constructor() {
        super(new Date());
        this.fethcUrl = window.location.origin + "/dashboard/day/";
    }

    async next() {
        this.date = new Date(this.date).setDate(new Date(this.date).getDate() + 1);
        return await this.fetch(this.date, this.fethcUrl);
    }

    async previous() {
        this.date = new Date(this.date).setDate(new Date(this.date).getDate() - 1);
        return await this.fetch(this.date, this.fethcUrl);
    }
}

export default DayFilter;
