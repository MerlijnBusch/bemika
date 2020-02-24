let currentId = 0;
let currentDays = 0;

function addDays(theDate) {
    currentDays++;
    return new Date(theDate.getTime() + currentDays * 24 * 60 * 60 * 1000);
}

function createActivity(title, description, location, time) {
    currentId++;
    return {
        id: currentId,
        activity: {
            title: title,
            description: description,
            location: location,
            time: time | new Date(),
        }
    }
}

const activities = [
    createActivity('Douche', 'De verzorger helpt jou met douche', 'Thuis', addDays(new Date())),
    createActivity('Eten', 'Je gaat naar de eetzaal om eten te halen', 'Eetzaal', addDays(new Date())),
    createActivity('Medicatie innemen', 'Je krijgt hulp van de verzorger met het innemen van de medicatie', 'thuis', addDays(new Date())),
];

export default activities;