const axios = require('axios');
const _data = window[`_eventIndexData`];

document.addEventListener('DOMContentLoaded', (event) => {
    methods.getData();
});

const methods = {
    async getData( clickedPage = null) {
        const url = _data.routeIndexData;
        const dataContainer = document.getElementById('data-container');
        //reset data
        dataContainer.innerHTML = '';
        let page = clickedPage ? clickedPage : 1;
        const response = await axios.post(url, {
            page: page,
        });
        const data = response.data;
        const eventData = data.data;
        const pagination = {
            curPage: data.curPage,
            dataCount: data.dataCount,
            maxPage: data.maxPage,
            nextPage: data.nextPage,
            prevPage: data.prevPage
        }
        // render event card
        eventData.forEach(data => {
            const eventThumbImg = document.createElement('img');
            eventThumbImg.setAttribute('src', data.thumb_img);
            eventThumbImg.classList.add('w-100');
            eventThumbImg.style.maxHeight = '300px';
            const eventContent = document.createElement('div');
            eventContent.classList.add('row');
            eventContent.classList.add('text-dark');
            eventContent.append(data.content);
            const eventTitle = document.createElement('h4');
            eventTitle.classList.add('mx-auto');
            eventTitle.classList.add('text-bold');
            eventTitle.classList.add('text-dark');
            eventTitle.append(data.title);
            const eventTitleRow = document.createElement('div');
            eventTitleRow.classList.add('row');
            eventTitleRow.append(eventTitle);
            const eventContainer = document.createElement('div');
            eventContainer.classList.add('container');
            eventContainer.append(eventTitleRow);
            eventContainer.append(eventContent);
            const col8Card = document.createElement('div');
            col8Card.classList.add('col-lg-8');
            col8Card.append(eventContainer);
            const col4Card = document.createElement('div');
            col4Card.classList.add('col-lg-4');
            col4Card.classList.add('mb-2');
            col4Card.append(eventThumbImg);
            const cardContainer = document.createElement('div');
            cardContainer.classList.add('container');
            cardContainer.classList.add('row');
            cardContainer.append(col4Card);
            cardContainer.append(col8Card);
            const cardEvent = document.createElement('div');
            cardEvent.classList.add('row');
            cardEvent.classList.add('my-2');
            cardEvent.classList.add('py-2');
            cardEvent.classList.add('card');
            cardEvent.append(cardContainer);
            const eventLinkDetail = document.createElement('a');
            eventLinkDetail.classList.add('strecthed-link');
            eventLinkDetail.classList.add('card-block');
            eventLinkDetail.classList.add('text-decoration-none');
            eventLinkDetail.setAttribute('href',_data.routeEventShow.replace(999, data.id));
            eventLinkDetail.append(cardEvent);
            dataContainer.append(eventLinkDetail);
        });
        // render pagination
        this.renderPagination(pagination);
    },
    linkPaginationListener(id) {
        this.getData(id);
    },
    renderPagination(data) {
        const paginationControl = document.getElementById('pagination-control');
        paginationControl.innerHTML = '';
        let paginationLinks = [];
        if(data.curPage != 1)
        {
            const prevLink = document.createElement('button');
            prevLink.append('<');
            prevLink.addEventListener('click',(e) => this.getData(data.prevPage));
            paginationLinks.push(prevLink);
        }
        if(data.maxPage != 1) {
            if (data.curPage == 1) {
                paginationLinks.push(data.curPage);
                const nextLink = document.createElement('button');
                nextLink.append(data.nextPage);
                nextLink.addEventListener('click',(e) => this.getData(data.nextPage));
                paginationLinks.push(nextLink);
                if(data.maxPage >= Number(data.nextPage) + 1) {
                    const nextLink2 = document.createElement('button');
                    nextLink2.append(Number(data.nextPage) + 1);
                    nextLink2.addEventListener('click',(e) => this.getData(Number(data.nextPage) + 1));
                    paginationLinks.push(nextLink2);
                }
            } else if (data.curPage == data.maxPage) {
                if(Number(data.curPage) - 2 != 0){
                    const prevLink2 = document.createElement('button');
                    prevLink2.append(Number(data.prevPage) - 1);
                    prevLink2.addEventListener('click',(e) => this.getData(Number(data.prevPage)-1));
                    paginationLinks.push(prevLink2);
                }
                const prevLink = document.createElement('button');
                prevLink.append(data.prevPage);
                prevLink.addEventListener('click',(e) => this.getData(data.prevPage));
                paginationLinks.push(prevLink);
                paginationLinks.push(data.curPage);
            } else {
                if(data.prevPage != data.curPage){
                    const prevLink = document.createElement('button');
                    prevLink.append(data.prevPage);
                    prevLink.addEventListener('click',(e) => this.getData(data.prevPage));
                    paginationLinks.push(prevLink);
                }
                paginationLinks.push(data.curPage);
                if(data.nextPage != data.curPage) {
                    const nextLink = document.createElement('button');
                    nextLink.append(data.nextPage);
                    nextLink.addEventListener('click',(e) => this.getData(data.nextPage));
                    paginationLinks.push(nextLink);
                }
            }
        }
        if(data.curPage != data.maxPage)
        {
            const nextLink = document.createElement('button');
            nextLink.append('>');
            nextLink.addEventListener('click',(e) => this.getData(data.nextPage));
            paginationLinks.push(nextLink);
        }
        const rowPagination = document.createElement('div');
        rowPagination.classList.add('row');
        rowPagination.classList.add('justify-content-end');
        rowPagination.classList.add('pagination');
        paginationLinks.forEach(link => {
            rowPagination.append(link);
        });
        paginationControl.append(rowPagination);
    }
}
