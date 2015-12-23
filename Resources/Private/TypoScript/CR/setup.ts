tt_content {
    text {
        20.append = COA
        20.append {
            15 = TEXT
            15 {
                if.isFalse.field = tx_add_link_label
                value = LLL:EXT:t3ecom/Resources/Private/Language/locallang.xlf:learn_more
                innerWrap = <div class="btn btn-default morelink ttcontent-more-link">|</div>
                typolink {
                    parameter.field = tx_add_link
                    title.field = tx_add_link_label
                    target = _self
                    additionalParams.field = tx_add_link_product
                    jumpurl = 1
                    ATagParams = data-morelink="tt_content"
                    ATagBeforeWrap = 1
                    userFunc = Ecom\T3ecom\Utility\AddProductUidToAdditionalLink->main
                    userFunc.targetPid = 120
                }
                fieldRequired = tx_add_link
            }

            # Use the field as value ... if available/overwritten.
            16 < .15
            16 {
                if >
                value >
                if.isTrue.field = tx_add_link_label
                field = tx_add_link_label
            }
        }
    }
}