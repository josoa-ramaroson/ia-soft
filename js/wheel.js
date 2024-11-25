const categories = [
    { 
        name: 'Administration', 
        color: '#FF6B6B',
        modules: ['Superviseur', 'Administrateur', 'Ressources Humaines']
    },
    { 
        name: 'Opérations', 
        color: '#845EC2',
        modules: ['Service Gaz', 'Production', 'Branchement', 'Releveur', 'Projet']
    },
    { 
        name: 'Finance', 
        color: '#00C9A7',
        modules: ['Facturation', 'Caisse', 'Trésorerie', 'Comptabilité', 'Recouvrement']
    },
    { 
        name: 'Relation Client', 
        color: '#4D8AF0',
        modules: ['Commercial', 'Clientèle']
    },
    { 
        name: 'Support & Contrôle', 
        color: '#FFC75F',
        modules: ['Informatique', 'Communication', 'Contrôle', 'Statistique', 'Plateforme', 'Approvisionnement']
    }
];

const SVG_CONFIG = {
    size: 1000,
    innerRadius: 80,
    categoryRadius: 250,
    moduleOuterRadius: 380,
    moduleInnerRadius: 335
};

class MenuWheel {
    constructor() {
        this.selectedCategory = null;
        this.center = SVG_CONFIG.size / 2;
        this.init();
    }

    init() {
        this.createSVG();
        this.createCategoryList();
        this.attachEventListeners();
    }

    createSVG() {
        const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
        svg.setAttribute('viewBox', `0 0 ${SVG_CONFIG.size} ${SVG_CONFIG.size}`);
        svg.style.width = '100%';
        svg.style.height = '100%';
        
        // Add definitions
        const defs = this.createDefs();
        svg.appendChild(defs);

        // Add background circles
        this.addBackgroundCircles(svg);

        // Add categories
        this.addCategories(svg);

        // Add boundary dots
        this.addBoundaryDots(svg);

        document.getElementById('wheel-svg').appendChild(svg);
    }

    createDefs() {
        const defs = document.createElementNS('http://www.w3.org/2000/svg', 'defs');

        // Center gradient
        const gradient = document.createElementNS('http://www.w3.org/2000/svg', 'linearGradient');
        gradient.id = 'centerGradient';
        gradient.innerHTML = `
            <stop offset="0%" style="stop-color:#2563eb;stop-opacity:0.1"/>
            <stop offset="100%" style="stop-color:#1d4ed8;stop-opacity:0.2"/>
        `;
        defs.appendChild(gradient);

        // Text paths
        categories.forEach((_, index) => {
            const sectorAngle = 360 / categories.length;
            const startAngle = index * sectorAngle;
            const endAngle = startAngle + sectorAngle;
            
            // Category text path
            const categoryPath = document.createElementNS('http://www.w3.org/2000/svg', 'path');
            categoryPath.id = `categoryPath-${index}`;
            categoryPath.setAttribute('d', this.createTextArcPath(startAngle, endAngle, (SVG_CONFIG.innerRadius + SVG_CONFIG.categoryRadius) / 2, true));
            categoryPath.setAttribute('fill', 'none');
            defs.appendChild(categoryPath);

            // Module text paths
            const modulePositions = this.calculateModulePositions(index, categories[index].modules.length);
            modulePositions.forEach((pos, moduleIndex) => {
                const modulePath = document.createElementNS('http://www.w3.org/2000/svg', 'path');
                modulePath.id = `textPath-${index}-${moduleIndex}`;
                modulePath.setAttribute('d', this.createTextArcPath(pos.startAngle, pos.endAngle, (SVG_CONFIG.moduleInnerRadius + SVG_CONFIG.moduleOuterRadius) / 2));
                modulePath.setAttribute('fill', 'none');
                defs.appendChild(modulePath);
            });
        });

        return defs;
    }

    addBackgroundCircles(svg) {
        // Category radius circle
        const categoryCircle = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
        categoryCircle.setAttribute('cx', this.center);
        categoryCircle.setAttribute('cy', this.center);
        categoryCircle.setAttribute('r', SVG_CONFIG.categoryRadius);
        categoryCircle.setAttribute('fill', 'none');
        categoryCircle.setAttribute('stroke', '#e2e8f0');
        categoryCircle.setAttribute('stroke-width', '2');
        svg.appendChild(categoryCircle);

        // Inner circle
        const innerCircle = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
        innerCircle.setAttribute('cx', this.center);
        innerCircle.setAttribute('cy', this.center);
        innerCircle.setAttribute('r', SVG_CONFIG.innerRadius);
        innerCircle.setAttribute('fill', 'url(#centerGradient)');
        innerCircle.setAttribute('stroke', '#e2e8f0');
        innerCircle.setAttribute('stroke-width', '2');
        svg.appendChild(innerCircle);

        // Center text
        const centerText = document.createElementNS('http://www.w3.org/2000/svg', 'text');
        centerText.setAttribute('x', this.center);
        centerText.setAttribute('y', this.center - 10);
        centerText.setAttribute('text-anchor', 'middle');
        centerText.setAttribute('fill', '#1e3a8a');
        centerText.style.fontSize = '32px';
        centerText.style.fontWeight = 'bold';
        centerText.style.filter = 'drop-shadow(0px 1px 2px rgba(0,0,0,0.1))';
        centerText.textContent = 'MENU';
        svg.appendChild(centerText);

        // Subtitle
        const subtitle = document.createElementNS('http://www.w3.org/2000/svg', 'text');
        subtitle.setAttribute('x', this.center);
        subtitle.setAttribute('y', this.center + 20);
        subtitle.setAttribute('text-anchor', 'middle');
        subtitle.setAttribute('fill', '#3b82f6');
        subtitle.style.fontSize = '14px';
        subtitle.style.fontWeight = '500';
        subtitle.style.letterSpacing = '0.05em';
        subtitle.textContent = '';
        subtitle.id = 'wheel-subtitle';
        svg.appendChild(subtitle);
    }

    addCategories(svg) {
        categories.forEach((category, index) => {
            const g = document.createElementNS('http://www.w3.org/2000/svg', 'g');
            g.classList.add('category');
            g.dataset.category = category.name;

            const sectorAngle = 360 / categories.length;
            const startAngle = index * sectorAngle;
            const endAngle = startAngle + sectorAngle;
            const midAngle = startAngle + sectorAngle / 2;

            // Category sector
            const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
            path.setAttribute('d', this.createArcPath(startAngle, endAngle, SVG_CONFIG.innerRadius, SVG_CONFIG.categoryRadius));
            path.setAttribute('fill', category.color);
            path.setAttribute('stroke', 'white');
            path.setAttribute('stroke-width', '2');
            path.classList.add('category-path');
            g.appendChild(path);

            // Category text
            const text = document.createElementNS('http://www.w3.org/2000/svg', 'text');
            text.setAttribute('dy', midAngle > 180 ? '0.35em' : '-0.35em');
            text.setAttribute('fill', 'white');
            text.style.fontSize = '15px';
            text.style.fontWeight = '700';
            text.style.filter = 'drop-shadow(0px 2px 2px rgba(0,0,0,0.4))';
            text.style.letterSpacing = '0.8px';
            text.classList.add('category-text');

            const textPath = document.createElementNS('http://www.w3.org/2000/svg', 'textPath');
            textPath.setAttribute('href', `#categoryPath-${index}`);
            textPath.setAttribute('startOffset', '50%');
            textPath.setAttribute('text-anchor', 'middle');
            textPath.style.transform = midAngle > 180 ? 'rotate(180deg)' : 'none';
            textPath.style.transformOrigin = 'center';
            textPath.textContent = category.name.toUpperCase();
            text.appendChild(textPath);
            g.appendChild(text);

            g.addEventListener('click', () => this.handleCategoryClick(category.name));
            svg.appendChild(g);
        });
    }

    addBoundaryDots(svg) {
        categories.forEach((_, index) => {
            const angle = (index * 360 / categories.length) - 90;
            const radians = angle * (Math.PI / 180);
            const x = this.center + SVG_CONFIG.innerRadius * Math.cos(radians);
            const y = this.center + SVG_CONFIG.innerRadius * Math.sin(radians);

            const dot = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
            dot.setAttribute('cx', x);
            dot.setAttribute('cy', y);
            dot.setAttribute('r', '3');
            dot.setAttribute('fill', '#64748b');
            svg.appendChild(dot);
        });
    }

    createCategoryList() {
        const container = document.getElementById('categories');
        categories.forEach(category => {
            const div = document.createElement('div');
            div.className = 'category-item';
            div.dataset.category = category.name;
            div.innerHTML = `
                <div class="category-color" style="background-color: ${category.color}"></div>
                <span class="category-name">${category.name}</span>
                <span class="module-count">${category.modules.length} modules</span>
            `;
            div.addEventListener('click', () => this.handleCategoryClick(category.name));
            container.appendChild(div);
        });
    }

    handleCategoryClick(categoryName) {
        if (this.selectedCategory === categoryName) {
            this.selectedCategory = null;
            document.querySelectorAll('.category').forEach(cat => {
                cat.classList.remove('active');
                this.removeModules(cat);
            });
            document.getElementById('wheel-subtitle').textContent = '';
        } else {
            this.selectedCategory = categoryName;
            document.querySelectorAll('.category').forEach(cat => {
                if (cat.dataset.category === categoryName) {
                    cat.classList.add('active');
                    this.showModules(cat, categories.find(c => c.name === categoryName));
                } else {
                    cat.classList.remove('active');
                    this.removeModules(cat);
                }
            });
            document.getElementById('wheel-subtitle').textContent = categoryName.toUpperCase();
        }
    }

    showModules(categoryElement, category) {
        const index = categories.findIndex(c => c.name === category.name);
        const modulePositions = this.calculateModulePositions(index, category.modules.length);

        modulePositions.forEach((position, moduleIndex) => {
            const g = document.createElementNS('http://www.w3.org/2000/svg', 'g');
            g.classList.add('module');

            const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
            path.setAttribute('d', this.createArcPath(
                position.startAngle,
                position.endAngle,
                SVG_CONFIG.moduleInnerRadius,
                SVG_CONFIG.moduleOuterRadius
            ));
            path.setAttribute('fill', category.color);
            path.style.filter = 'drop-shadow(1px 1px 2px rgba(0,0,0,0.2))';
            g.appendChild(path);

            const text = document.createElementNS('http://www.w3.org/2000/svg', 'text');
            text.setAttribute('dy', position.midAngle > 180 ? '0.35em' : '-0.35em');
            text.setAttribute('fill', 'white');
            text.classList.add('module-text');
            text.style.fontSize = '14px';
            text.style.fontWeight = '600';
            text.style.filter = 'drop-shadow(1px 2px 3px rgba(0,0,0,0.4))';
            text.style.letterSpacing = '0.5px';

            const textPath = document.createElementNS('http://www.w3.org/2000/svg', 'textPath');
            textPath.setAttribute('href', `#textPath-${index}-${moduleIndex}`);
            textPath.setAttribute('startOffset', '50%');
            textPath.setAttribute('text-anchor', 'middle');
            textPath.style.transform = position.midAngle > 180 ? 'rotate(180deg)' : 'none';
            textPath.style.transformOrigin = 'center';
            textPath.textContent = category.modules[moduleIndex];
            text.appendChild(textPath);
            g.appendChild(text);

            categoryElement.appendChild(g);
        });
    }

    removeModules(categoryElement) {
        categoryElement.querySelectorAll('.module').forEach(module => module.remove());
    }

    createArcPath(startAngle, endAngle, innerRadius, outerRadius) {
        const startRadians = (startAngle - 90) * (Math.PI / 180);
        const endRadians = (endAngle - 90) * (Math.PI / 180);
        
        const startOuterX = this.center + outerRadius * Math.cos(startRadians);
        const startOuterY = this.center + outerRadius * Math.sin(startRadians);
        const endOuterX = this.center + outerRadius * Math.cos(endRadians);
        const endOuterY = this.center + outerRadius * Math.sin(endRadians);
        
        const startInnerX = this.center + innerRadius * Math.cos(endRadians);
        const startInnerY = this.center + innerRadius * Math.sin(endRadians);
        const endInnerX = this.center + innerRadius * Math.cos(startRadians);
        const endInnerY = this.center + innerRadius * Math.sin(startRadians);

        const largeArcFlag = endAngle - startAngle > 180 ? 1 : 0;

        return `M ${startOuterX} ${startOuterY} ` +
               `A ${outerRadius} ${outerRadius} 0 ${largeArcFlag} 1 ${endOuterX} ${endOuterY} ` +
               `L ${startInnerX} ${startInnerY} ` +
               `A ${innerRadius} ${innerRadius} 0 ${largeArcFlag} 0 ${endInnerX} ${endInnerY} ` +
               'Z';
    }

    createTextArcPath(startAngle, endAngle, radius, isCategory = false) {
        const angleOffset = isCategory ? 5 : 8;
        const adjustedStartAngle = startAngle + angleOffset;
        const adjustedEndAngle = endAngle - angleOffset;
        
        const startRadians = (adjustedStartAngle - 90) * (Math.PI / 180);
        const endRadians = (adjustedEndAngle - 90) * (Math.PI / 180);
        
        const startX = this.center + radius * Math.cos(startRadians);
        const startY = this.center + radius * Math.sin(startRadians);
        const endX = this.center + radius * Math.cos(endRadians);
        const endY = this.center + radius * Math.sin(endRadians);

        const largeArcFlag = endAngle - startAngle > 180 ? 1 : 0;

        return `M ${startX} ${startY} A ${radius} ${radius} 0 ${largeArcFlag} 1 ${endX} ${endY}`;
    }

    calculateModulePositions(categoryIndex, moduleCount) {
        const sectorAngle = 360 / categories.length;
        const baseCategoryAngle = categoryIndex * sectorAngle;
        
        const moduleWidth = 60;
        const spaceBetweenModules = 10;
        const totalAngleNeeded = (moduleWidth + spaceBetweenModules) * moduleCount;
        
        const startAngle = baseCategoryAngle - (totalAngleNeeded / 2) + (sectorAngle / 2);

        return Array.from({ length: moduleCount }, (_, moduleIndex) => {
            const moduleStartAngle = startAngle + ((moduleWidth + spaceBetweenModules) * moduleIndex);
            const moduleEndAngle = moduleStartAngle + moduleWidth;
            const midAngle = (moduleStartAngle + moduleEndAngle) / 2;
            
            return {
                startAngle: moduleStartAngle,
                endAngle: moduleEndAngle,
                midAngle: midAngle
            };
        });
    }

    attachEventListeners() {
        window.addEventListener('resize', () => {
            // Handle responsive behavior if needed
        });
    }
}

// Initialize the wheel when the DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new MenuWheel();
});