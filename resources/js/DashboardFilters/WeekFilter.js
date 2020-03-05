import DashboardBaseFilter from "./DashboardBaseFilter";

class WeekFilter extends DashboardBaseFilter {

    constructor() {
        super(new Date());
        this.fethcUrl = window.location.origin + "/dashboard/week/";
    }

    async next() {
        this.date = new Date(this.date).setDate(new Date(this.date).getDate() + 7);
        return await this.fetch(this.date, this.fethcUrl);
    }

    async previous() {
        this.date = new Date(this.date).setDate(new Date(this.date).getDate() - 7);
        return await this.fetch(this.date, this.fethcUrl);
    }
}

export default WeekFilter;
