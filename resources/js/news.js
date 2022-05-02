const axios = require('axios');
const _data = window[`_newsIndexData`];

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
        console.log(page);
        const response = await axios.post(url, {
            page: page,
        });
        const data = response.data;
        const newsData = data.data;
        const pagination = {
            curPage: data.curPage,
            dataCount: data.dataCount,
            maxPage: data.maxPage,
            nextPage: data.nextPage,
            prevPage: data.prevPage
        }
        // render news card
        newsData.forEach(data => {
            const newsThumbImg = document.createElement('img');
            newsThumbImg.setAttribute('src', data.thumb_img);
            newsThumbImg.classList.add('w-100');
            newsThumbImg.style.maxHeight = '300px';
            const newsContent = document.createElement('div');
            newsContent.classList.add('row');
            newsContent.classList.add('text-dark');
            newsContent.append(data.content);
            const newsTitle = document.createElement('h4');
            newsTitle.classList.add('mx-auto');
            newsTitle.classList.add('text-bold');
            newsTitle.classList.add('text-dark');
            newsTitle.append(data.title);
            const newsTitleRow = document.createElement('div');
            newsTitleRow.classList.add('row');
            newsTitleRow.append(newsTitle);
            const newsContainer = document.createElement('div');
            newsContainer.classList.add('container');
            newsContainer.append(newsTitleRow);
            newsContainer.append(newsContent);
            const col8Card = document.createElement('div');
            col8Card.classList.add('col-lg-8');
            col8Card.append(newsContainer);
            const col4Card = document.createElement('div');
            col4Card.classList.add('col-lg-4');
            col4Card.classList.add('mb-2');
            col4Card.append(newsThumbImg);
            const cardContainer = document.createElement('div');
            cardContainer.classList.add('container');
            cardContainer.classList.add('row');
            cardContainer.append(col4Card);
            cardContainer.append(col8Card);
            const cardNews = document.createElement('div');
            cardNews.classList.add('row');
            cardNews.classList.add('my-2');
            cardNews.classList.add('py-2');
            cardNews.classList.add('card');
            cardNews.append(cardContainer);
            const newsLinkDetail = document.createElement('a');
            newsLinkDetail.classList.add('strecthed-link');
            newsLinkDetail.classList.add('card-block');
            newsLinkDetail.classList.add('text-decoration-none');
            newsLinkDetail.setAttribute('href',_data.routeNewsShow.replace(999, data.id));
            newsLinkDetail.append(cardNews);
            dataContainer.append(newsLinkDetail);
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
        if (data.curPage == 1) {
            paginationLinks.push(data.curPage);
            const nextLink = document.createElement('button');
            nextLink.append(data.nextPage);
            nextLink.addEventListener('click',(e) => this.getData(data.nextPage));
            paginationLinks.push(nextLink);
            const nextLink2 = document.createElement('button');
            nextLink2.append(Number(data.nextPage) + 1);
            nextLink2.addEventListener('click',(e) => this.getData(Number(data.nextPage) + 1));
            paginationLinks.push(nextLink2);
        } else if (data.curPage == data.maxPage) {
            const prevLink2 = document.createElement('button');
            prevLink2.append(Number(data.prevPage) - 1);
            prevLink2.addEventListener('click',(e) => this.getData(Number(data.prevPage)-1));
            paginationLinks.push(prevLink2);
            const prevLink = document.createElement('button');
            prevLink.append(data.prevPage);
            prevLink.addEventListener('click',(e) => this.getData(data.prevPage));
            paginationLinks.push(prevLink);
            paginationLinks.push(data.curPage);
        } else {
            const prevLink = document.createElement('button');
            prevLink.append(data.prevPage);
            prevLink.addEventListener('click',(e) => this.getData(data.prevPage));
            paginationLinks.push(prevLink);
            paginationLinks.push(data.curPage);
            const nextLink = document.createElement('button');
            nextLink.append(data.nextPage);
            nextLink.addEventListener('click',(e) => this.getData(data.nextPage));
            paginationLinks.push(nextLink);
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
