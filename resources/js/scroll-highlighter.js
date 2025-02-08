// scroll-highlighter.js

export default function scrollHighlighter(options = {}) {
  return function (Alpine) {
    // Merge user-provided options with plugin defaults
    const defaultOffset = options.offset ?? 100
    const defaultHighlightClasses = options.highlightClasses ?? 'underline text-blue-500 dark:text-blue-500 transition-colors';

    // =============================================
    // 1) Global Store for Multiple "Groups"
    // =============================================
    Alpine.store('scrollHighlighter', {
      groups: {},

      getGroup(name) {
        if (!name) name = 'default'
        if (!this.groups[name]) {
          this.groups[name] = {
            scrollEl: window,
            offset: defaultOffset,
            highlightClasses: defaultHighlightClasses,
            items: [],
            sections: []
          }
        }
        return this.groups[name]
      },

      setGroupOptions({ group = 'default', offset, highlightClasses }) {
        const g = this.getGroup(group)
        if (typeof offset !== 'undefined') g.offset = offset
        if (typeof highlightClasses !== 'undefined') g.highlightClasses = highlightClasses
      },

      setScrollable({ group = 'default', el }) {
        const g = this.getGroup(group)
        g.scrollEl = el
      },

      registerItem({ group = 'default', el, target }) {
        const g = this.getGroup(group)
        g.items.push({ el, target })
      },

      registerSection({ group = 'default', el, id }) {
        const g = this.getGroup(group)
        g.sections.push({ el, id })
      },

      onScroll(groupName = 'default') {
        const g = this.getGroup(groupName)
        const scrollable = g.scrollEl
        if (!scrollable) return

        const scrollPos = (scrollable === window)
          ? window.scrollY
          : scrollable.scrollTop

        let currentSectionId = ''

        for (let i = 0; i < g.sections.length; i++) {
          const s = g.sections[i]
          const next = g.sections[i + 1]
          const startPos = s.el.offsetTop - g.offset
          const nextPos = next ? next.el.offsetTop - g.offset : Infinity

          if (scrollPos >= startPos && scrollPos < nextPos) {
            currentSectionId = s.id
            break
          }
        }

        for (let item of g.items) {
          item.el.classList.remove(...g.highlightClasses.split(' '))
        }
        if (currentSectionId) {
          const activeItem = g.items.find(i => i.target === currentSectionId)
          if (activeItem) {
            activeItem.el.classList.add(...g.highlightClasses.split(' '))
          }
        }
      },

      smoothScrollTo({ group = 'default', target }) {
        const g = this.getGroup(group)
        const scrollable = g.scrollEl
        const sectionEl = document.getElementById(target)
        if (!sectionEl) return

        const targetPos = sectionEl.offsetTop - g.offset
        if (scrollable === window) {
          window.scrollTo({ top: targetPos, behavior: 'smooth' })
        } else {
          scrollable.scrollTo({ top: targetPos, behavior: 'smooth' })
        }
      }
    })


    // ===========================================================
    // 2) Helper: parseDirectiveExpression
    // ===========================================================
    function parseDirectiveExpression({ expression, evaluate, defaultProp }) {
      if (!expression || !expression.trim()) return {}
      try {
        const result = evaluate(expression)
        if (typeof result === 'string') {
          return { [defaultProp]: result }
        }
        if (result && typeof result === 'object') {
          return result
        }
        return { [defaultProp]: expression }
      } catch (err) {
        return { [defaultProp]: expression }
      }
    }

    // ===================================
    // 3) Directives
    // ===================================

    // x-scroll-group
    Alpine.directive('scroll-group', (el, { expression }, { evaluate }) => {
      const data = parseDirectiveExpression({
        expression,
        evaluate,
        defaultProp: 'group'
      })
      const groupName = data.group || 'default'
      Alpine.store('scrollHighlighter').setGroupOptions({
        group: groupName,
        offset: data.offset,
        highlightClasses: data.highlightClasses
      })
    })

    // x-scroll-scrollable
    Alpine.directive('scroll-scrollable', (el, { expression }, { evaluate }) => {
      const data = parseDirectiveExpression({
        expression,
        evaluate,
        defaultProp: 'group'
      })
      const groupName = data.group || 'default'
      Alpine.store('scrollHighlighter').setScrollable({ group: groupName, el })

      el.addEventListener('scroll', () => {
        Alpine.store('scrollHighlighter').onScroll(groupName)
      })
      Alpine.store('scrollHighlighter').onScroll(groupName)
    })

    // x-scroll-item
    Alpine.directive('scroll-item', (el, { expression }, { evaluate }) => {
      const data = parseDirectiveExpression({
        expression,
        evaluate,
        defaultProp: 'target'
      })
      const group = data.group || 'default'
      const target = data.target
      if (!target) return

      Alpine.store('scrollHighlighter').registerItem({ group, el, target })
      el.addEventListener('click', e => {
       // e.preventDefault()
        Alpine.store('scrollHighlighter').smoothScrollTo({ group, target })
      })
    })

    // x-scroll-section
    Alpine.directive('scroll-section', (el, { expression }, { evaluate }) => {
      const data = parseDirectiveExpression({
        expression,
        evaluate,
        defaultProp: 'id'
      })
      const group = data.group || 'default'
      const id = data.id
      if (!id) return

      if (!el.id) el.id = id
      Alpine.store('scrollHighlighter').registerSection({ group, el, id })
    })

    // 4) Window scroll fallback for "default"
    window.addEventListener('scroll', () => {
      const g = Alpine.store('scrollHighlighter').getGroup('default')
      if (g.scrollEl === window) {
        Alpine.store('scrollHighlighter').onScroll('default')
      }
    })

    const defaultGroup = Alpine.store('scrollHighlighter').getGroup('default')
    if (defaultGroup.scrollEl === window) {
      Alpine.store('scrollHighlighter').onScroll('default')
    }
  }
}
