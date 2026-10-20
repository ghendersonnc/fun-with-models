FROM node:22-alpine

WORKDIR /app

RUN chown node:node /app
COPY --chown=node:node package.json ./

USER node

RUN npm install --no-audit --no-fund

CMD ["npm", "run", "build"]
